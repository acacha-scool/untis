<?php

namespace Scool\Untis\Wrappers;

use Maatwebsite\Excel\Files\ExcelFile;

/**
 * Class GruposListImport.
 */
class GruposListImport extends ExcelFile
{

    /**
     * @var string
     */
    protected $delimiter  = ',';

    /**
     * @var string
     */
    protected $enclosure  = '"';

    /**
     * @var string
     */
    protected $lineEnding = '\r\n';

    /**
     * Get file.
     *
     * @return string
     */
    public function getFile()
    {
        return storage_path('untis/GPU003.TXT');
    }
}