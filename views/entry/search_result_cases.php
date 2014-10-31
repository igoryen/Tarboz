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
// to draw the end of the section of a group of translations
function close_kids_house(){?>
  </div><!-- kids_house -->
<?php 
}?>
    
    
<?php
// to draw the section for translation X of group of langugae A
function make_kid_room($kid_room_array){?>
  <div class="kid_room">
    <div class="kid_text">
      <a href="entryview.php?id=<?php echo $kid_room_array['id'];?>">
      <?php echo $kid_room_array['text'];   ?></a>
    </div>
    <div class="kid_profile_link">T</div>
    <div class="kid_dad_link">O</div>
    <div class="kid_votes">+12 -3</div>
    <div class="kid_added_by">
      <a href="userview.php?id=<?php echo $kid_room_array['user']; ?>"><?php
        echo $kid_room_array['user'];
      ?></a>
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

      </div><!-- kids_house -->

  }
  ?>

function dad_house_dad_0($no_original) { ?>
  <div id="dad_house">
    <div class="door"></div>
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
      <div class="kid_profile_link">T</div>
      <div class="kid_dad_link">O</div>
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
              <div class="door"><?php echo $ary['language']; ?></div>
            <div id="dad_room">
              <div id="dad_text">
                <a href="entryview.php?id=<?php echo $ary['id']?>"><?php 
              echo $ary['text']; 
              ?></a></div>
              <div id="dad_profile_link">O</div>
          <div id="kids_num">18</div>
          <div id="add_kid">+</div>
          <div class="kid_added_by">
            <a href="userview.php?id=<?php echo $ary['user']; ?>">
              <?php echo $ary['user']; ?>
            </a>
          </div>
        </div>
      </div><!-- dad_house -->

        <?php }
        ?>