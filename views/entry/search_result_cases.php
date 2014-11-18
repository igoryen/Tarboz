<?php
// for CASE 1: Original: doesn't exist in the database. Variants: don't exist
function no_dad_no_kids($text) { ?>

  <div class="no_dad_no_kids">
    <?php echo $text; ?>
  </div>

<?php
}?>


<?php
// to draw the beginning of the section of a group of translations
function open_kids_house($kids_house_lang){?>
  <div class="kids_house">
    <div class="door"><?php echo $kids_house_lang;  ?></div>
<?php
}?>

<?php
// to draw the beginning of the section of a group of translations
function open_kids_house2(){?>
  <div class="kids_house">
<?php
}?>
    
<?php
// to draw the end of the section of a group of translations
function close_kids_house(){?>
  </div><!-- kids_house -->
<?php
}?>

<?php
// to draw the beginning of the section for 
// several groups of 1 original + 1 or more translations
function open_families_house(){?>
  <div class="families_house">
<?php
}
// to draw the end of the section for 
// several groups of 1 original + 1 or more translations
function close_families_house(){?>
  </div><!-- close_families_house -->
<?php
}?>
  
  
<?php
// to draw the beginning of the section of 
// a single group of 1 original + 1 or more translations
function open_family_apartment(){?>
  <div class="kids_house">
<?php
}
// to draw the end of the section of 
// a single group of 1 original + 1 or more translations
function close_family_apartment(){?>
  </div><!-- kids_house -->
<?php
}?>
  

<?php
// to draw the section for translation X of group of langugae A
function make_kid_room($kid_room_array){?>
  <div class="kid_room">
    <div class="kid_text">
      &bull;&nbsp;<a href="entryview.php?id=<?php echo $kid_room_array['id'];?>"><?php echo $kid_room_array['text'];?></a>
    </div>
    <div class="kid_profile_link"><span class="question" id="tran">T</span></div>
    <?php if( !is_null($kid_room_array['dad']) ) { ?>
    <div class="kid_dad_link">
      <a href="entryview.php?id=<?php echo $kid_room_array['dad'];?>">O</a>
    </div>
    <?php } ?>
    <div class="kid_votes">
        <span style="cursor: alias;" title="<?php echo $kid_room_array['likes'];?> users like">+<?php echo $kid_room_array['likes'];?></span> 
        <span style="cursor: alias;" title="<?php echo $kid_room_array['dislikes'];?> users dislike">-<?php echo $kid_room_array['dislikes'];?></span></div>
    <div class="kid_added_by">
      <a href="profile.php?id=<?php echo $kid_room_array['user']; ?>">
          <?php $userMan = new UserManager(); echo $userMan->getUserByUserId($kid_room_array['user'])->getLogin();;?>
      </a>
    </div>
    <div class="is_mom">A</div>
  </div>
 <?php
}?>


  <?php
// to draw the section for translation X of group of langugae A
function make_family_kid_room($kid_room_array){?>
  <div class="kid_room">
    <div class="kid_text">
      &bull;&nbsp;
      <a href="entryview.php?id=<?php echo $kid_room_array['id'];?>"><?php echo $kid_room_array['text'];?></a>
    </div>
    <div class="kid_profile_link"><span class="question" id="tran">T</span></div>
    <div class="kid_dad_link">
      <a href="entryview.php?id=<?php echo $kid_room_array['dad'];?>">O</a>
    </div>
    <div class="kid_votes">
        <span style="cursor: alias;" title="<?php echo $kid_room_array['likes'];?> users like">+<?php echo $kid_room_array['likes'];?></span> 
        <span style="cursor: alias;" title="<?php echo $kid_room_array['dislikes'];?> users dislike">-<?php echo $kid_room_array['dislikes'];?></span>
    </div>
    <div class="kid_added_by">
      <a href="profile.php?id=<?php echo $kid_room_array['user']; ?>">
          <?php $userMan = new UserManager(); echo $userMan->getUserByUserId($kid_room_array['user'])->getLogin();;?>
      </a>
    </div>
    <div class="is_mom">A</div>
  </div>
 <?php
}?>
  
  

<?php
// to draw the section for translation X of group of langugae A
function make_dad_room($dad_room_array){?>
  <div class="kid_room">
    <div class="kid_text">
      <a href="entryview.php?id=<?php echo $dad_room_array['id'];?>">
      <?php echo $dad_room_array['text'];   ?></a>
    </div>
    <div class="kid_profile_link">O</div>
    <div class="kid_dad_link">T</div>
    <div class="kid_votes">+12 -3</div>
    <div class="kid_added_by">
      <a href="userview.php?id=<?php echo $dad_room_array['user']; ?>">
        <?php $userMan = new UserManager(); echo $userMan->getUserByUserId($dad_room_array['user'])->getLogin();;?>
      </a>
    </div>
    <div class="is_mom">A</div>
  </div>
 <?php
}?>


<?php
// for CASE 2: Original: doesn't exist. Variants: 2 English, 2 Russian, 2 Mandarin
  function no_dad_kids_many($ar_a){?>


        <div class="kid_room">
          <div class="kid_text"><?php //echo $house0_kid1_text;   ?></div>
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

      <!-- </div> kids_house -->
  }


function dad_house_dad_0($no_original) { ?>
  <div id="dad_house">
    <div class="dad_door"></div>
    <div id="dad_room">
      <div id="dad_text"><?php echo $no_original; ?></div>
      <div id="dad_profile_link">..</div>
      <div id="kids_num">..</div>
      <div id="add_kid">..</div>
    </div>
  </div><!-- dad_house -->
  <?php
  }

  function kid_houses_kids_0($no_kids) { ?>
  <div class="kids_house">
    <div class="door"></div>
    <div class="kid_room">
      <div class="kid_text"><?php echo $no_kids; ?></div>
      <div class="kid_profile_link">Translation</div>
      <div class="kid_dad_link">Original</div>
      <div class="kid_votes">+12 -3</div>
      <div class="kid_added_by">user123</div>
      <div class="is_mom">A</div>
    </div><!-- kid_room -->
  </div><!-- kids_house-->
<?php } ?>

  <?php
// for CASE 3: Original: exists. Variants: don't exist.
  function dad_house_dad_1($ary) { ?>
        <div id="dad_house">
            <!--<div class="dad_door"><span><?php echo $ary['language']; ?></span></div>-->
            <div id="dad_room">
              <div id="dad_text">
                <a href="entryview.php?id=<?php echo $ary['id']?>"><?php echo $ary['text']; ?></a>
              </div>
              <div id="dad_profile_link"><span class="question" id="orig">O</span></div>
              <div style="display:inline-block;width:50px"></div>
              <div id="kids_num" title="There are <?php echo $ary['kidsnum']; ?> translations for this phrase"><?php echo $ary['kidsnum']; ?></div>
              <div id="add_kid"><a href="entrycreate.php" title="Add a new translation">+</a></div>
              <div class="kid_added_by">
                <a href="profile.php?id=<?php echo $ary['user']; ?>">
                    <?php $userMan = new UserManager(); echo $userMan->getUserByUserId($ary['user'])->getLogin();;?>
                </a>
              </div>
            </div>
         </div><!-- dad_house -->

<?php }
?>

           <?php
// for CASE 3: Original: exists. Variants: don't exist.
  function make_family_dad_room($ary) { ?>
        <!--<div id="dad_house">-->
            <!--<div class="dad_door"><span><?php echo $ary['language']; ?></span></div>-->
            <div id="dad_room">
              <div id="dad_text">
                <a href="entryview.php?id=<?php echo $ary['id']?>"><?php echo $ary['text']; ?></a>
              </div>
              <div id="dad_profile_link"><span class="question" id="orig">O</span></div>
              <div style="display:inline-block;width:50px"></div>
              <div id="kids_num" title="There are <?php echo $ary['kidsnum']; ?> translations for this phrase"><?php echo $ary['kidsnum']; ?></div>
              <div id="add_kid"><a href="entrycreate.php" title="Add a new translation">+</a></div>
              <div class="kid_added_by">
                <a href="profile.php?id=<?php echo $ary['user']; ?>">
                    <?php $userMan = new UserManager(); echo $userMan->getUserByUserId($ary['user'])->getLogin();;?>
                </a>
              </div>
            </div>
         <!--</div> dad_house -->

<?php }
?>
         
         
<?php
// open family
function open_family(){?>
  <div class="family">
<?php
}

function close_family($family_text){?>
  <br>
  <p>........<i><?php echo substr($family_text, 0, 50);?></i></p>
  </div><!-- family -->
  <br>
<?php
}

  function close_family2(){?>
  </div><!-- family -->
<?php
}?>

<?php 
function section_heading($ary){?>

  <p class="section_heading"><?php 
    echo $ary['text']; 
?> <span class="question" id="<?php echo $ary['tipid']?>" >?</span>
  </p>

<?php 
}?>