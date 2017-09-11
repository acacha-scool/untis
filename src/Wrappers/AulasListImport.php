<?php

namespace Scool\Untis\Wrappers;

use Maatwebsite\Excel\Files\ExcelFile;

/**
 * Class AulasListImport.
 */
class AulasListImport extends ExcelFile
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
        return storage_path('untis/GPU005.TXT');
    }
}