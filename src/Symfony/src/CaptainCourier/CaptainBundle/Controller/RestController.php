<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Routing\ClassResourceInterface;


class RestController extends Controller implements ClassResourceInterface
{
    private $response;

    public function __construct()
    {
        $this->response = new Response(
            '{"error": "No Route"}',
            404,
            array('content-type' => "application/json")
        );
    }

    public function coptionAction()
    {
        return $this->response;
    } 

    public function cgetAction()
    {
        return $this->response;
    } 

    public function cnewAction()
    {
        return $this->response;
    } 


    public function cpostAction()
    {
        return $this->response;
    } 
 

    public function cpatchAction()
    {
        return $this->response;
    } 
 

    public function getAction($slug)
    {
        return $this->response;
    } 
 

    public function editAction($slug)
    {
        return $this->response;
    } 
 

    public function putAction($slug)
    {
        return $this->response;
    } 
 

    public function patchAction($slug)
    {
        return $this->response;
    } 
 

    public function lockAction($slug)
    {
        return $this->response;
    } 
 

    public function banAction($slug)
    {
        return $this->response;
    } 
 

    public function removeAction($slug)
    {
        return $this->response;
    } 
 

    public function deleteAction($slug)
    {
        return $this->response;
    } 
 

    public function getCommentsAction($slug)
    {
        return $this->response;
    } 
 

    public function newCommentsAction($slug)
    {
        return $this->response;
    } 
 

    public function postCommentsAction($slug)
    {
        return $this->response;
    } 
 

    public function getCommentAction($slug, $id)
    {
        return $this->response;
    } 
 

    public function editCommentAction($slug, $id)
    {
        return $this->response;
    } 
 

    public function putCommentAction($slug, $id)
    {
        return $this->response;
    } 
 

    public function postCommentVoteAction($slug, $id)
    {
        return $this->response;
    } 
 

    public function removeCommentAction($slug, $id)
    {
        return $this->response;
    } 
 

    public function deleteCommentAction($slug, $id)
    {
        return $this->response;
    } 
 

    public function linkAction($slug)
    {
        return $this->response;
    } 
 

    public function unlinkAction($slug)
    {
        return $this->response;
    } 
 

}