<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace AppBundle\Utils\Package;

use AppBundle\Utils\Package\Abstracts\BlockAbstract;

class Package extends BlockAbstract
{
    /**
     * @param $schema
     */
    public function query($schema)
    {
        $this->result = json_decode($this->sendRequest($schema, $this->prepareRequest($schema)), true);

        $this->pagination($schema);

        $this->setResponse($schema);
    }

    /**
     * @param $schema
     */
    public function textToSpeech($schema)
    {
        $this->result = $this->sendRequest($schema, $this->prepareRequest($schema));

        $this->pagination($schema);

        $this->setResponse($schema);
    }

    /**
     * @param $schema
     */
    public function getContextx($schema)
    {
        $this->result = json_decode($this->sendRequest($schema, $this->prepareRequest($schema)), true);

        $this->pagination($schema);

        $this->setResponse($schema);
    }

    /**
     * @param $schema
     */
    public function getContext($schema)
    {
        $this->result = json_decode($this->sendRequest($schema, $this->prepareRequest($schema)), true);

        $this->pagination($schema);

        $this->setResponse($schema);
    }

    /**
     * @param $schema
     */
    public function addContext($schema)
    {
        $this->result = json_decode($this->sendRequest($schema, $this->prepareRequest($schema)), true);

        $this->pagination($schema);

        $this->setResponse($schema);
    }

    /**
     * @param $schema
     */
    public function clearContexts($schema)
    {
        $this->result = json_decode($this->sendRequest($schema, $this->prepareRequest($schema)), true);

        $this->pagination($schema);

        $this->setResponse($schema);
    }

    /**
     * @param $schema
     */
    public function deleteContext($schema)
    {
        $this->result = json_decode($this->sendRequest($schema, $this->prepareRequest($schema)), true);

        $this->pagination($schema);

        $this->setResponse($schema);
    }

}