<?php
class Tulos { 
    private static $errorlist = array (
        - 1 => "Tuntematon virhe",
        0 => "",
        11 => "Kenttä ei voi olla tyhjä",
        12 => "Kentässä on liikaa merkkejä",
        13 => "Pelaajat vähintään 1",
        14 => "Pelaajat max. 5",
        15 => "Pisteet vähintään 1",
        16 => "Pisteet max. 60",
        17 => "Sijoitus vähintään 1",
        18 => "Päivämäärä pitää olla ennen tätä päivää",
        19 => "Kommentit voi olla max. 1000 merkkiä",
        20 => "Kenttä pitää olla numero",
        21 => "Anna muodossa pp/kk/vvvv"

);

public static function getError($errorcode) {
    if (isset ( self::$errorlist [$errorcode] ))
        return self::$errorlist [$errorcode];

    return self::$errorlist [- 1];
}

    private $place;
    private $date;
    private $quiztype;
    private $players;
	  private $placement;
    private $points;
    private $comment;
    private $id;

    function __construct($place = "", $date = "", $quiztype = "", $players = "", $points = "", $placement = "", $comment = "", $id = 0) {
		$this->place = trim ( $place );
    $this->date = trim ( $date );
    $this->quiztype = trim ( $quiztype );
    $this->players= trim ( $players );
    $this->points = trim ( $points );
    $this->placement = trim ( $placement );
    $this->comment = trim ( $comment );
		$this->id = $id;
    }
    
    public function setPlace($place) {
		$this->place = trim ( $place );
	}

	public function getPlace() {
		return $this->place;
    }
    
    public function checkPlace($required = true, $min = 1, $max = 50) {

        if ($required == false && strlen ( $this->place ) == 0) {
			return 0;
        }
        
        if (strlen ( $this->place) < $min) {
			return 11;
        }
        
        if (strlen ( $this->place ) > $max) {
			return 12;
        }
        
        return 0;

    }


    public function setDate($date) {
		$this->date = trim ( $date );
    }
    public function getDate() {
		return $this->date;
    }

    public function checkDate($required = true, $min = 1) {
        
        if ( $this->date > date('d/m/Y')){
            return 18;
        }

        if (strlen ( $this->date) < $min) {
			      return 11;
        }

        if ( preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/", $this->date) == false ){
            return 21;
        }

		return 0;
    }

    public function setQuiztype($quiztype) {
      $this->quiztype = trim ( $quiztype );
    }
  
    public function getQuiztype() {
      return $this->quiztype;
      }

      public function checkQuiztype($required = true) {
        
        if (strlen ( $this->quiztype ) < 2) {
          return 11;
            }
            


		  return 0;
    }
    
    public function setPlayers($players) {
		$this->players = trim ( $players );
    }
    public function getPlayers() {
		return $this->players;
    }

    public function checkPlayers($required = true, $min = 1, $max = 5) {

        if ($required == false &&   $this->players  == 0) {
			return 0;
        }
        
        if ( $this->players  < $min) {
			return 13;
        }
        
        if ( $this->players   > $max) {
			return 14;
        }

        if ( is_numeric($this->players)  == false) {
			return 20;
        }
        
        return 0;

    }

    public function setPoints($points) {
		$this->points = trim ( $points );
    }
    public function getPoints() {
		return $this->points;
    }
    public function checkPoints($required = true, $min = 1, $max = 60) {

        if ($required == false &&  $this->points  == 0) {
			return 0;
        }
        
        if ($this->points  < $min) {
			return 15;
        }
        
        if ($this->points  > $max) {
			return 16;
        }
        
        return 0;

    }

    public function setPlacement($placement) {
		$this->placement = trim ( $placement );
    }
    public function getPlacement() {
		return $this->placement;
    }
    public function checkPlacement($required = true, $min = 1) {

        if ($required == false &&  $this->placement  == 0) {
			return 0;
        }
        
        if ($this->placement < $min) {
			return 17;
        }
        
        
        return 0;

    }

    public function setComment($comment) {
		$this->comment = trim ( $comment );
    }
    public function getComment() {
		return $this->comment;
    }
    public function checkComment($max = 1000) {


        if (strlen ( $this->comment ) > $max) {
			return 19;
        }
        
        
        return 0;

    }



    public function setId($id) {
		$this->id = trim ( $id );
	}

	public function getId() {
		return $this->id;
	}

}
?>