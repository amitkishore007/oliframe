<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class WalletModel extends CI_Model
{
	
	
	public function get_my_wallet_money() {

		$wallet_money = $this->db->query('SELECT SUM(debit) + SUM(credit) as wallet_money FROM wallet');
		

		if ($wallet_money) {
			
			return $wallet_money->row();
		}


	}

	public function add_wallet($user_id,$amount,$txnid) {

		$this->db->insert('wallet',[
			'user_id'=>$user_id,
			'credit'=>$amount,
			'transaction_id'=>$txnid
			]);

		if ($this->db->affected_rows()==1) {
			
			return true;
		}
	}

}