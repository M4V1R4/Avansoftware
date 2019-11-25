<?php namespace MyApp\Utils {
  
  class Message
  {
      private $title = null;
      private $mainText = null;
      private $extraText = null;
      private $level = 'alert alert-primary';
      private $isCloseButton = false;

      public function __construct()
      {
      }

      public function getTitle()
      {
          return $this->title;
      }

      public function getMessage()
      {
          return $this->mainText;
      }

      public function getExtraMessage()
      {
          return $this->extraText;
      }

      public function getLevel()
      {
          return $this->level;
      }

      public function isCloseButton()
      {
          return $this->isCloseButton;
      }

      public function setPrimaryMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-primary";
      }

      public function setSecondaryMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-secondary";
      }

      public function setSuccessMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-success";
      }

      public function setDangerMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-danger";
      }

      public function setWarningMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-warning";
      }

      public function setInfoMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-info";
      }

      public function setLightMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-light";
      }

      public function setDarkMessage($title, $mainMessage, $extraMessage, $isCloseButton)
      {
          $this->title = $title;
          $this->mainText = $mainMessage;
          $this->extraText = $extraMessage;
          $this->isCloseButton = $isCloseButton;
          $this->level = "alert alert-dark";
      }

  }

}