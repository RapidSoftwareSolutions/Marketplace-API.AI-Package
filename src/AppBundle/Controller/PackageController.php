<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */
class PackageController extends Controller
{
    /**
     *
     * @Route("/api/{packageName}", requirements={"packageName": "ApiAI"})
     * @Method({"GET"})
     *
     * @return JsonResponse
     */
    public function metadataAction()
    {
        return new JsonResponse($this->getParameter('app_bundle.metadata'));
    }

    /**
     * @Route("/api/{packageName}/query", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function queryAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('query');

        $callback($this->getParameter('app_bundle.query'));

        return new JsonResponse($graph->getResponse());
    }

    /**
     * @Route("/api/{packageName}/textToSpeech", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function textToSpeechAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('textToSpeech');

        $callback($this->getParameter('app_bundle.text_to_speech'));

        return new JsonResponse($graph->getResponse());
    }

    /**
     * @Route("/api/{packageName}/getContextx", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function getContextxAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('getContextx');

        $callback($this->getParameter('app_bundle.get_contextx'));

        return new JsonResponse($graph->getResponse());
    }

    /**
     * @Route("/api/{packageName}/getContext", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function getContextAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('getContext');

        $callback($this->getParameter('app_bundle.get_context'));

        return new JsonResponse($graph->getResponse());
    }

    /**
     * @Route("/api/{packageName}/addContext", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function addContextAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('addContext');

        $callback($this->getParameter('app_bundle.add_context'));

        return new JsonResponse($graph->getResponse());
    }

    /**
     * @Route("/api/{packageName}/clearContexts", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function clearContextsAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('clearContexts');

        $callback($this->getParameter('app_bundle.clear_contexts'));

        return new JsonResponse($graph->getResponse());
    }

    /**
     * @Route("/api/{packageName}/deleteContext", requirements={"packageName": "ApiAI"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function deleteContextAction()
    {
        $graph = $this->get('app_bundle.package');

        $callback = $graph->getCallback('deleteContext');

        $callback($this->getParameter('app_bundle.delete_context'));

        return new JsonResponse($graph->getResponse());
    }

}
