<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
      <div class="warp">
          <div class="pageall">
              <div class="charecterall">
                  <div class="charec_left" style="background-image: url('images/characters/archer/cha_archer_img01.png');

background-repeat: no-repeat;
background-size: 440px 470px;
background-position: right top;">
                      <h2>CHARACTER</h2>
                      <div class="txtbox" style="margin-bottom:10px;">
                          <a href="<?= Yii::app()->createUrl('character/guardian');?>"><img src="images/characters/gurad-inactive.png"  onmouseover="this.src='images/characters/gurad-active.png'" onmouseout="this.src='images/characters/gurad-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/sorceress');?>"><img src="images/characters/sorceress-inactive.png"   onmouseover="this.src='images/characters/sorceress-active.png'" onmouseout="this.src='images/characters/sorceress-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/rouge');?>"><img src="images/characters/rouge-inactive.png"   onmouseover="this.src='images/characters/archer-active.png'" onmouseout="this.src='images/characters/archer-inactive.png'" ></a>
                          <a href="<?= Yii::app()->createUrl('character/warrior');?>"><img src="images/characters/war-inactive.png"   onmouseover="this.src='images/characters/war-active.png'" onmouseout="this.src='images/characters/war-inactive.png'"></a>
                          <img src="images/characters/archer-active.png"></a>
                        </div>
                      <h1>ARCHER</h1>
                      <h2>Elves ผู้ง้างคันศรไปพร้อมเอื้อนเสียงเพลงอันไพเราะ</h2>
                      <div class="txtbox" style="margin-top:5px;width:500px">
                          Archer ที่เดินทางมาสู่โลกภายนอก ที่แบกรับภารกิจคุ้มครองรักษาธรรมชาติ โจมตีด้วยลูกธนูที่รวดเร็วและรุนแรงจากระยะไกล หรือเป็นหน่วยสนับสนุนเพื่อนร่วมรบด้วยพลังแห่งเสียงเพลง
                      </div>
                      <table width="100%" border="0" cellspacing="8" cellpadding="0" style="width:900px;margin:20px 0px 20px 0px">
                          <tbody><tr>
                              <td width="16%" align="center" valign="top">
                                  <img src="images/characters/archer/cha_archer_img03.png" width="57" height="56"></td>
                              <td width="84%" valign="middle">
                                  <h3 style="padding-top:0px">Shooter
                                  </h3>
                                  โจมตีอย่างรุนแรงและต่อเนื่องราวกับไม่มีสิ้นสุด หรือลอบสังหารด้วยยิงหวังผลเพื่อดับชีพในนัดเดียว มีบทบาทในเรื่องการโจมตีเป็นหลัก
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="top">
                                  <img src="images/characters/archer/cha_archer_img04.png" width="56" height="56"></td>
                              <td valign="middle">
                                  <h3 style="padding-top:0px">Tuner
                                  </h3>
                                  สนับสนุนด้วยบทเพลงอันหลากหลาย นอกจากจะทำให้ศัตรูอ่อนแอลงแล้ว บทเพลงที่เหมาะสมก็สนับสนุนการรบได้เป็นอย่างดี
                              </td>
                          </tr>
                      </tbody></table>
                  </div>
                      <?php
                        $this->widget('zii.widgets.jui.CJuiTabs',array(
                            'tabs'=>array(
                                // panel 3 contains the content rendered by a partial view
                                'Basic'=>array('ajax'=>$this->createUrl('archerbuild')."&build=Basic"),
                                'Shooter'=>array('ajax'=>$this->createUrl('archerbuild')."&build=Shooter"),
                                'Tuner'=>array('ajax'=>$this->createUrl('archerbuild')."&build=Tuner"),
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

