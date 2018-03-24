<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
      <div class="warp">
          <div class="pageall">
              <div class="charecterall">
                  <div class="charec_left" style="background-image: url('images/characters/warrior/cha_wrrior_img01.png');
background-repeat: no-repeat;
background-size: 450px 470px;
background-position: right top;">
                      <h2>CHARACTER</h2>
                      <div class="txtbox" style="margin-bottom:10px;">
                          <a href="<?= Yii::app()->createUrl('character/guardian');?>"><img src="images/characters/gurad-inactive.png"  onmouseover="this.src='images/characters/gurad-active.png'" onmouseout="this.src='images/characters/gurad-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/sorceress');?>"><img src="images/characters/sorceress-inactive.png"   onmouseover="this.src='images/characters/sorceress-active.png'" onmouseout="this.src='images/characters/sorceress-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/rouge');?>"><img src="images/characters/rouge-inactive.png"  onmouseover="this.src='images/characters/rouge-active.png'" onmouseout="this.src='images/characters/rouge-inactive.png'"></a>
                          <img src="images/characters/war-active.png"  >
                          <a href="<?= Yii::app()->createUrl('character/archer');?>"><img src="images/characters/archer-inactive.png"   onmouseover="this.src='images/characters/archer-active.png'" onmouseout="this.src='images/characters/archer-inactive.png'"></a>
                        </div>
                      <h1>WARRIOR</h1>
                      <h2>อัศวินแห่งอาณาจักรที่ล่มสลาย</h2>
                      <div class="txtbox" style="margin-top:5px;width:500px">
                          อัศวินผู้อยู่ภายใต้สังกัดแห่งอาณาจักรที่เคยรุ่งเรืองเมื่อครั้งอดีต แต่ยังคงไว้ซึ่งเกียรติของอัศวินที่พึงมี ทักษะการต่อสู้จะแบ่งเป็น นักสู้ผู้แข็งแกร่งที่ยืนหยัดรับการโจมตีได้ทุกรูปแบบ หรือ สไตล์การต่อสู้ที่พุ่งรบด้วยพละกำลังและความรุนแรง
                      </div>
                      <table width="100%" border="0" cellspacing="8" cellpadding="0" style="width:900px;margin:20px 0px 20px 0px">
                          <tbody><tr>
                              <td width="16%" align="center" valign="top">
                                  <img src="images/characters/warrior/cha_wrrior_img03.png" width="57" height="56"></td>
                              <td width="84%" valign="middle">
                                  <h3 style="padding-top:0px">Rage
                                  </h3>
                                  
นักรบผู้บ้าคลั่ง มีความได้เปรียบในการรบที่ต่อเนื่อง สามารถเพิ่มความเร็วในการโจมตีและมีความคล่องตัวสูงและสกิลโจมตีที่รุนแรง
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="top">
                                  <img src="images/characters/warrior/cha_wrrior_img04.png" width="56" height="56"></td>
                              <td valign="middle">
                                  <h3 style="padding-top:0px">Protector
                                  </h3>
                                  
นักรบผู้แข็งแกร่งที่เปรียบดั่งกำแพงเหล็กกล้าในสงคราม ทักษะในการป้องกันต่อทุกสถานการณ์ต่างๆ เป็น Tanker ที่แข็งแกร่งในการสู้รบ
                              </td>
                          </tr>
                      </tbody></table>
                  </div>
                      <?php
                        $this->widget('zii.widgets.jui.CJuiTabs',array(
                            'tabs'=>array(
                                // panel 3 contains the content rendered by a partial view
                                'Basic'=>array('ajax'=>$this->createUrl('warriorbuild')."&build=Basic"),
                                'Rage'=>array('ajax'=>$this->createUrl('warriorbuild')."&build=Rage"),
                                'Protector'=>array('ajax'=>$this->createUrl('warriorbuild')."&build=Protector"),
                            ),
                            // additional javascript options for the tabs plugin
                            'options'=>array(
                                'collapsible'=>true,
                                
                            ),
                            'htmlOptions'=>array(
                                'style'=>'margin: 0px 0px 20px 0px'
                            ),
                            'id'=>'MyTab-Menu',
                        ));
                        ?>
                 
              </div>
                      

              ขอขอบคุณข้อมูลจากเว็บไซต์ eos.gg.in.th เพื่อชาว EOS ทุกท่าน<br><br>
          </div>

      </div>

      </div>
                      

              
          </div>

      </div>

