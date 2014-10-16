<?php 
  require("../Shared/header.php");
  include "../../config.php";
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";
// #) get the value of the search phrase from the search page
$search_phrase = "Happy Birthday to you";
// #) create a verbatim of the search phrase (P1.1.1.)
$verbatim = 'plum under';
// #) initialize manager class
$em = new EntryManager();
// #) get the Father entry
$dad = $em->getFatherByVerbatim($verbatim);
// #) find the children of house 1 (i.e. equivalent entries in language 1)
// #) save all the children entries in an array
// #) find the children of house 2 (i.e. equivalent entries in language 2)
// #) save all the entries in an array
// #) find the children of house 3 (i.e. equivalent entries in language 3  )
// #) save all the entries in an array
// ==============================
// get values from dad
$dad_lang = "English";
$dad_text = $dad->getEntryText();
//================================
// get values from kids in lang 1
//================================
// get values from kids in lang 2
//================================
// get values from kids in lang 3
//===============================
// assign values of ENGLISH kids
//===============================
// assign values of RUSSIAN kids
//===============================
// assign values of MANDARIN kids
?>
  
  <div id="land">
    <div id="village">

      <div id="dad_house">
        <div class="door"><?php echo $dad_lang;?></div>
        <div id="dad_room">
          <div id="dad_text"><?php echo $dad_text; ?></div>
          <div id="dad_profile_link">O</div>
          <div id="kids_num">18</div>
          <div id="add_kid">+</div>
        </div>
      </div><!-- dad_house -->

      <div class="kids_house">
        <div class="door"><?php // echo $house0_lang;  ?></div>

        <div class="kid_room">
          <div class="kid_text"><?php // echo $house0_kid1_text;  ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+12 -3</div>
          <div class="kid_added_by">user123</div>
          <div class="is_mom">A</div>
        </div>

        <div class="kid_room">
          <div class="kid_text"><?php // echo $house0_kid2_text;  ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+0 -10</div>
          <div class="kid_added_by">user456</div>
          <div class="is_mom"></div>
        </div>

      </div><!-- kids_house -->

      <div class="kids_house">
        <div class="door"><?php // echo $house1_lang;  ?></div>

        <div class="kid_room">
          <div class="kid_text"><?php // echo $house1_kid1_text;  ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+12 -3</div>
          <div class="kid_added_by">user123</div>
          <div class="is_mom">A</div>
        </div>

        <div class="kid_room">
          <div class="kid_text"><?php // echo $house1_kid2_text;  ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+0 -10</div>
          <div class="kid_added_by">user456</div>
          <div class="is_mom"></div>
        </div>

      </div><!-- kids_house -->

      <div class="kids_house">
        <div class="door"><?php // echo $house2_lang;  ?></div>

        <div class="kid_room">
          <div class="kid_text"><?php // echo $house2_kid1_text;  ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+25 -0</div>
          <div class="kid_added_by">user789</div>
          <div class="is_mom"></div>
        </div>

        <div class="kid_room">
          <div class="kid_text"><?php // echo $house2_kid2_text;  ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+1 -15</div>
          <div class="kid_added_by">user111</div>
          <div class="is_mom">A</div>
        </div>

      </div><!-- kids_house -->

    </div><!-- village -->
  </div><!-- land -->

<?php require("../Shared/footer.php"); ?>