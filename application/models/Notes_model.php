<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @author  aduartem
 *
 */
class Notes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    public function get($id = NULL)
    {
        if( ! empty($id))
        {
            $query = $this->db->where('id', $id)->get('notes');

            if($query->num_rows() === 1)
            {
                return $query->row();
            }
            return NULL;
        }
        else
        {
            $query = $this->db->get('notes');

            if($query->num_rows() > 0)
            {
                return $query->result();
            }
            return NULL;
        }

    }

    public function insert($data)
    {
        $set = array(
            'title'   => $data['title'], 
            'body'    => $data['body'],
            'created' => date('Y-m-d H:i:s')
        );

        $this->db->insert('notes', $set);

        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function update($id, $data)
    {
        $set = array(
            'title'       => $data['title'], 
            'body'        => $data['body'],
            'last_update' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id)->update('notes', $set);

        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('notes');

        if($this->db->affected_rows() === 1)
        {
            return TRUE;
        }
        return FALSE;
    }

}

/* End of file Notes_model.php */
/* Location: ./application/models/Notes_model.php */