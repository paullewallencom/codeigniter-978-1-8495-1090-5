<?php

class Postmodel extends Model 
{

	function Postmodel()
	{
		parent::Model();
		$this->load->database();
	}
	
	function get_post($id = NULL)
	{
		if($id === NULL)
		{
			$query = $this->db->get('posts');
			$result = $query->result_array();

			return $result;
		}
		else
		{
			$id = (int) $id;
			
			$this->db->where('id', $id);
			$query = $this->db->get('posts');
			$result = $query->row_array();
			
			return $result;
		}
	}
	
	function update_post($data, $id)
	{
		$id = (int) $id;
		$items = array();

		if(array_key_exists('author', $data)) { $items['author'] = $data['author']; } else { return FALSE; }
		if(array_key_exists('title', $data)) { $items['title'] = $data['title']; } else { return FALSE; }
		if(array_key_exists('content', $data)) { $items['content'] = $data['content']; } else { return FALSE; }
		
		$this->db->where('id', $id);
		$this->db->update('posts', $items);
	}
	
	function create_post($data)
	{
		$items = array();
		
		if(array_key_exists('author', $data)) { $items['author'] = $data['author']; } else { return FALSE; }
		if(array_key_exists('title', $data)) { $items['title'] = $data['title']; } else { return FALSE; }
		if(array_key_exists('content', $data)) { $items['content'] = $data['content']; } else { return FALSE; }
		
		$this->db->insert('posts', $items);
	}
	
	function delete_post($id = NULL)
	{
		if($id === NULL)
		{
			$this->db->empty_table('posts');
		}
		else
		{
			$id = (int) $id;
			$this->db->where('id', $id);
			$this->db->delete('posts');
		}
	}

}

?>