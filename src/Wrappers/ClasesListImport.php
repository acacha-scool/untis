<?php

namespace Scool\Untis\Wrappers;

use Maatwebsite\Excel\Files\ExcelFile;

/**
 * Class ClasesListImport.
 */
class ClasesListImport extends ExcelFile
{

    /**
     * @var null
     */
    protected $encoding = 'ISO-8859-1';

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
        return storage_path('untis/GPU002.TXT');
    }
}