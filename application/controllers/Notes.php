<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . "/libraries/REST_Controller.php";
/**
 * 
 * @author  aduartem
 *
 */
class Notes extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notes_model');
    }

    public function index_get()
    {
        $notes = $this->notes_model->get();

        if($notes !== NULL)
        {
            $this->response(array('response' => $notes, 200));
        }
        else
        {
            $this->response(array('message' => 'No hay notas', 404));
        }
    }

    public function find_get($id)
    {
        if( ! $id)
        {
            $this->response(NULL, 400);
        }

        $notes = $this->notes_model->get($id);

        if($notes !== NULL)
        {
            $this->response(array('response' => $notes, 200));
        }
        else
        {
            $this->response(array('message' => 'No se encuentra la nota', 404));
        }
    }

    public function index_post()
    {
        if( ! $this->post('title') || ! $this->post('body'))
        {
            $this->response(NULL, 400);
        }

        $params = array(
            'title' => $this->post('title'),
            'body'  => $this->post('body')
        );

        if($this->notes_model->insert($params))
        {
            $this->response(array('response' => 'Nota agregada', 200));
        }
        else
        {
            $this->response(array('message' => 'Hubo un error', 404));
        }
    }

    public function index_put($id)
    {
        if( ! $id || ! $this->put('title') || ! $this->put('body'))
        {
            $this->response(NULL, 400);
        }

        $params = array(
            'title' => $this->put('title'),
            'body'  => $this->put('body')
        );

        if($this->notes_model->update($id, $params))
        {
            $this->response(array('response' => 'Nota actualizada', 200));
        }
        else
        {
            $this->response(array('message' => 'Hubo un error', 404));
        }
    }

    public function index_delete($id)
    {
        if( ! $id)
        {
            $this->response(NULL, 400);
        }

        if($this->notes_model->delete($id))
        {
            $this->response(array('response' => 'Nota eliminada', 200));
        }
        else
        {
            $this->response(array('message' => 'Hubo un error', 404));
        }
    }

}

/* End of file Notes.php */
/* Location: ./application/controllers/Notes.php */