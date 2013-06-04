<?php
if ( ( $_SESSION['username']!='' ) && ( $_GET['status']!='loggedout' ) ):
?>
<ul class="fixedBar">
                           <li title="Acasa">
                              <a href="index.php">
                                <p> Acasa </p>
                                <img  class="rotation" src="/images/icons/homebig.png">
                              </a>
                                <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                            <li title="Setari">
                                <a href="/profile.php?user=<?php echo $_SESSION['user_id']?>" />
                                <p> Setari </p>
                                <img  class="rotation" src="/images/icons/settingsbig.png">
                                </a>
                                <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                            <li title="Upload">
                              <a href="#upload">
                                <p> Upload </p>
                                <img  class="rotation" src="/images/icons/upload.png">
                              </a>
                              <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                            <li title="Delogare">
                              <a href="?status=loggedout">
                                <p> Delogare </p>
                                <img  class="rotation" src="/images/icons/signoutbig.png">
                              </a>
                              <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                        </ul>
<?php
  else :
?>
<ul class="fixedBar">
                           <li title="Acasa">
                              <a href="index.php">
                                <p> Acasa </p>
                                <img  class="rotation" src="/images/icons/homebig.png">
                              </a>
                                <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                            <li title="Logare">
                                <a href="#loginModal">
                                <p> Logare </p>
                                <img  class="rotation" src="/images/icons/signinbig.png">
                                </a>
                                <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                            <li title="Inregistrare">
                              <a href="#signupModal">
                                <p> Inregistrare </p>
                                <img  class="rotation" src="/images/icons/signupbig.png">
                              </a>
                              <span style="color:grey; position:relative; left:8px;top:3px;display:inline; float:left;">|</span>
                            </li>
                        </ul>
                        <?php endif; ?>