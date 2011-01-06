<?php

	Class extension_hinted_textinput extends Extension{

		public function about(){
			return array(
				'name' => 'Field: Hinted Text Input',
				'version' => '1.0',
				'release-date' => '2011-5-01',
				'author' => array(
					'name' => 'Huib Keemink',
					'website' => 'http://www.creativedutchmen.com',
					'email' => 'huib.keemink@creativedutchmen.com'
				)
			);
		}

		public function install(){
			try{
				Symphony::Database()->query(
					"CREATE TABLE `symphony`.`tbl_fields_hinted_text_input` (
					`id` INT( 11 ) UNSIGNED NOT NULL ,
					`field_id` INT( 11 ) UNSIGNED NOT NULL ,
					`validator` VARCHAR( 255 ) NULL ,
					PRIMARY KEY  (`id`),
					KEY `field_id` (`field_id`))"
				);
			}
			catch(Exception $e){
				return false;
			}
			return true;
		}
	
		public function uninstall(){
			try{
				Symphony::Database()->query(
					"DROP TABLE `tbl_fields_hinted_text_input`"
				);
			}
			catch(Exception $e){
				return false;
			}
			return true;
		}
	}