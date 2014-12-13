<?php
// Create custom filter
class DirtyWordsFilter extends php_user_filter
{
    /**
     * @param resource $in       Incoming bucket brigade
     * @param resource $out      Outgoing bucket brigade
     * @param int      $consumed Number of bytes consumed
     * @param bool     $closing  Last bucket brigade in stream?
     */
    public function filter($in, $out, &$consumed, $closing)
    {
        $words = array('grime', 'dirt', 'grease');
        $wordData = array();
        foreach ($words as $word) {
            $replacement = array_fill(0, mb_strlen($word), '*');
            $wordData[$word] = implode('', $replacement);
        }
        $bad = array_keys($wordData);
        $good = array_values($wordData);

        // Iterate each bucket from incoming bucket brigade
        while ($bucket = stream_bucket_make_writeable($in)) {
            // Censor dirty words in bucket data
            $bucket->data = str_replace($bad, $good, $bucket->data);

            // Increment total data consumed
            $consumed += $bucket->datalen;

            // Send bucket to downstream brigade
            stream_bucket_append($out, $bucket);
        }

        return PSFS_PASS_ON;
    }
}
stream_filter_register('dirty_words_filter', 'DirtyWordsFilter');

// Use custom filter
$handle = fopen('data.txt', 'rb');
stream_filter_append($handle, 'dirty_words_filter');
while (feof($handle) !== true) {
    echo fgets($handle);
}
fclose($handle);
