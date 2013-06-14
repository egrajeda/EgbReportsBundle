<?php

namespace Egrajeda\ReclineJsBundle\Helper;

class ArrayToCsvTransformer
{
    /**
     * @param array $data
     *
     * @return string
     */
    public function transform(array $data)
    {
        ob_start();

        $fp = fopen('php://output', 'w');
        foreach ($data as $i => $row) {
            if ($i === 0) {
                fputcsv($fp, array_keys($row));
            }
            fputcsv($fp, $row);
        }
        fclose($fp);

        return ob_get_clean();
    }
}
