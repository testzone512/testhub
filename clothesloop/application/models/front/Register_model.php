<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');

        // Call the Model constructor
        parent::__construct();
    }

    /**
     * save_register
     *
     * This is used to Add user details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_register($arrData) {

        if ($this->db->insert('users', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * save_question
     *
     * This is used to Add user question details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_question($arrData) {

        if ($this->db->insert('question', $arrData)) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * update_register
     *
     * This is used to update User details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$UpdateData, integer-$userId
     * @return void
     */
    function update_register($userId, $UpdateData) {

        $this->db->where('user_id', $userId);

        if ($this->db->update('users', $UpdateData)) {
            return true;
        } else {
            return false;
        }
    }
    
	
	 /**
     * get_user_details_for_edit
     *
     * This is used to get user details
     *
     * @author	Chintan Bhimani
     * @access	public
	 * @param   array-, integer-$userId
     * @return void
     */
    function get_user_details_for_edit($userId) 
	{
        $this->db->select("*");
        $this->db->from("users u");
        $this->db->join('question q','u.user_id = q.question_user_id','left');
        if($userId != 0 ){
            $this->db->where('user_id', $userId);
        }
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }
    
    /**
	 * update_user_details_on_email
	 *
	 * This is used to update user details by id
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   Integer-$iUserId, Array - $arrData.
	 * @return void
	 */
	 
	function update_user_details_on_email($iUserEmail, $arrData)
    {
		$this->db->where('user_email',$iUserEmail);
		$this->db->where('user_activation_pending', 1);

		if($this->db->update('users', $arrData))
		{
            //echo $this->db->last_query(); die;
				return true;
		}
		else
		{
				return false;
		}	
	}
    
    /**
	 * deactivated_account
	 *
	 * This is used to update user details by id
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   Integer-$iUserId, Array - $arrData.
	 * @return void
	 */
    function deactivated_account($iUserEmail,$pass, $arrData)
    {
		$this->db->where('user_email',$iUserEmail);
        $this->db->where('user_password',$pass);

		if($this->db->update('users', $arrData))
		{
            //echo $this->db->last_query(); die;
				return true;
		}
		else
		{
				return false;
		}	
	}

    /**
     * check_old_password
     *
     * This is used to check if password matche or not
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   string-$user_email.
     * @return true - if password matches, else will return false.
     */

    function check_old_password($password)
    {
        $this->db->select('user_id');

        $this->db->where('user_password', $password);

        $objQuery = $this->db->get('users');

        if($objQuery->result_array())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * PasswordMatch
     *
     * This is used to Match Old Password
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$userId
     * @return void
     */
    function PasswordMatch($password, $userId=''){


        $this->db->where('user_password', $password);

        if($userId!='')
            $this->db->where('user_id =', $userId);

        $this->db->select();

        $objQuery = $this->db->get('users');
        //echo $this->db->last_query();
        if ($objQuery->num_rows() > 0){
            echo 'true';
        } else {
            echo 'false';
        }
    }

    /**
     * OldPasswordAndNewPasswordDiffrent
     *
     * This is use to check OldPassword And NewPassword Diffrent
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$userId
     * @return void
     */
    function OldPasswordAndNewPasswordDiffrent($oldPassword, $newPassword, $userId=''){


        $this->db->where('user_password', $oldPassword);
        $this->db->where('user_password', $newPassword);

        if($userId!='')
            $this->db->where('user_id !=', $userId);

        $this->db->select();

        $objQuery = $this->db->get('users');
        //echo $this->db->last_query();
        if ($objQuery->num_rows() > 0){
            echo 'false';
        } else {
            echo 'true';
        }
    }
   

}
?>