<?php
	class ctrl_contact {
		function view(){
			common::load_view('top_page_contact.html', VIEW_PATH_CONTACT . 'contact_list.html');
		}
		
		function send_contact_us(){
			echo json_encode('Done!');
			return;
		}
	}
?>