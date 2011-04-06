<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class RequireLogin extends CBehavior {
  public function attach($owner) {
    $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
  }//end-attach

  public function handleBeginRequest($event) {
    $arrWithoutlogin = array('site/login');
    if (Yii::app()->user->isGuest) {
      if (isset($_GET['r'])) {
        if (!in_array($_GET['r'],$arrWithoutlogin))  Yii::app()->user->loginRequired();
      }//end-if-isset$GET['r']
    }
  }//end-handleBeginRequest
}
?>