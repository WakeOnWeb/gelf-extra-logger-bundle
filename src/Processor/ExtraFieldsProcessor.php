<?php

namespace Wakeonweb\GelfExtraLogger\Processor;

/**
 * ExtraFieldsProcessor
 *
 * @author Stephane PY <s.py@wakeonweb.com>
 */
class ExtraFieldsProcessor
{
    /**
     * @var array
     */
    private $extraFields;

    /**
     * @param array $extraFields extraFields
     */
    public function __construct(array $extraFields)
    {
        $this->extraFields = $extraFields;
    }

    /**
     * @param array $record record
     *
     * @return array
     */
    public function __invoke(array $record)
    {
        $record['extra'] = array_merge($record['extra'], $this->extraFields);

        return $record;
    }


}
