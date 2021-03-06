<?php
class Contact extends Page{
	static $db = array(
        'Mailto' => 'Varchar(100)',
        'SubmitText' => 'Text'
    );

    function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.OnSubmission", new TextField('Mailto', 'Email submissions to'));
        $fields->addFieldToTab("Root.OnSubmission", new TextareaField('SubmitText', 'Text on Submission'));

        return $fields;
    }
}


class Contact_Controller extends Page_Controller{
	static $allowed_actions = array(
        'ContactForm'
    );



    function ContactForm() {
        // Create fields
        $fields = new FieldList(
            new TextField('Name', _t('CONTACT.FULLNAME',"Your Full Name") . '*'),
			new TextField('Phone', _t('CONTACT.PHONE','Your Phone Number')),
            new EmailField('Email', _t('CONTACT.EMAIL',"Your Email") . '*'),
			new OptionsetField(
			   $name = "Type",
			   $title = "",
			   $source = array(
			      "Open Account" => _t('CONTACT.OPENACCOUNT',"Open Account"),
			      "Deposit" =>  _t('CONTACT.DEPOSIT',"Deposit"),
			      "Withdrawl" =>  _t('CONTACT.WITHDRAWL',"Withdrawl"),
			      "Enquiry" =>  _t('CONTACT.ENQUIRY',"Enquiry")
			   ),
			   $value = "Open Account"
			  ),
            new TextareaField('Message',_t('CONTACT.MESSAGE',"Message") . '*')
        );

        // Create action
        $actions = new FieldList(
            new FormAction('SendContactForm', _t('CONTACT.SEND',"Send"))
        );

        // Create Validators
        $validator = new RequiredFields('Name', 'Email', 'Message');

        return new Form($this, 'ContactForm', $fields, $actions, $validator);
    }

	function SendContactForm($data, $form) {

        //Set data
        $From = 'customerservice@fxrcif.com';
        $To = $this->Mailto;
        $Subject = "RCM Contact Form";
        $email = new Email($From, $To, $Subject);
        //set template
        $email->setTemplate('ContactEmail');
        //populate template
        $email->populateTemplate($data);
        //send mail
        $email->send();
        //return to submitted message
		$this->redirect($this->Link("?success=1"));
    }

	public function Success()
    {
        return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }
}
?>
