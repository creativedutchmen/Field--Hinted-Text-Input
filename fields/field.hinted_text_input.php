<?php

require_once(TOOLKIT . '/fields/field.input.php');

class fieldHinted_text_input extends fieldInput{

	public function __construct(&$parent){
		parent::__construct($parent);
		$this->_name = __('Hinted Text Input');
		$this->_required = true;

		$this->set('required', 'no');
	}
	
	public function displayPublishPanel(&$wrapper, $data=NULL, $flagWithError=NULL, $fieldnamePrefix=NULL, $fieldnamePostfix=NULL){
		parent::displayPublishPanel($wrapper, $data, $flagWithError, $fieldnamePrefix, $fieldnamePostfix);
		$popular = Symphony::Database()->fetch(sprintf('SELECT value, count(value) as occurance FROM `tbl_entries_data_%d` GROUP BY value ORDER BY occurance DESC LIMIT 10', $this->get('id')));
		if(is_array($popular)){
			$ul = new XMLElement('ul', null, Array('class'=>'tags singular'));
			foreach($popular as $entry){
				$li = new XMLElement('li', $entry["value"]);
				$ul->appendChild($li);
			}
			$wrapper->appendChild($ul);
		}
	}
	
}