<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
      <div class="warp">
          <div class="pageall">
              <div class="charecterall">
                  <div class="charec_left" style="background-image: url('images/characters/guardian/cha_guardian_img01.png');

background-repeat: no-repeat;
background-size: 400px 470px;
background-position: right top;">
                      <h2>CHARACTER</h2>
                      <div class="txtbox" style="margin-bottom:10px;">
                          <img src="images/characters/gurad-active.png" >
                          <a href="<?= Yii::app()->createUrl('character/sorceress');?>"><img src="images/characters/sorceress-inactive.png"   onmouseover="this.src='images/characters/sorceress-active.png'" onmouseout="this.src='images/characters/sorceress-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/rouge');?>"><img src="images/characters/rouge-inactive.png"  onmouseover="this.src='images/characters/rouge-active.png'" onmouseout="this.src='images/characters/rouge-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/warrior');?>"><img src="images/characters/war-inactive.png"   onmouseover="this.src='images/characters/war-active.png'" onmouseout="this.src='images/characters/war-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/archer');?>"><img src="images/characters/archer-inactive.png"   onmouseover="this.src='images/characters/archer-active.png'" onmouseout="this.src='images/characters/archer-inactive.png'"></a>
                        </div>
                      <h1>Guardian</h1>
                      <h2>นักรบแห่งเทพ ชนเผ่าที่ได้รับพลังจากธรรมชาติ</h2>
                      <div class="txtbox" style="margin-top:5px;width:500px">
                          เทพธิดานักรบผู้มีหน้าที่ปกปักษ์รักษาโลกใบนี้ผู้ได้รับความคุ้มครองจากผืนดินและจิตวิญาณแห่งธรรมชาตินักรบเผ่าพันธุ์นี้จะมีพลังโจมตีและความสามารถในการป้องกันตัวสูง โดยแบ่งออกเป็น
                      </div>
                      <table width="100%" border="0" cellspacing="8" cellpadding="0" style="width:900px;margin:20px 0px 20px 0px">
                          <tbody><tr>
                              <td width="16%" align="center" valign="top">
                                  <img src="images/characters/guardian/cha_guardian_img03.png" width="57" height="56"></td>
                              <td width="84%" valign="middle">
                                  <h3 style="padding-top:0px">Storm
                                  </h3>
                                  โดดเด่นในเรื่องของการโจมตี สามารถใช้เสริมความแข็งแกร่งเชิงรุกให้แก่เพื่อนร่วมทีมได้ มีรูปแบบการโจมตีที่รุนแรงและหลากหลาย
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="top">
                                  <img src="images/characters/guardian/cha_guardian_img04.png" width="56" height="56"></td>
                              <td valign="middle">
                                  <h3 style="padding-top:0px">Earth
                                  </h3>
                                  โดดเด่นไปในเรื่องการป้องกัน สามารถเพิ่มความแข็งแกร่งให้แก่ตัวเองและปาร์ตี้ได้มีบทบาทสำคัญในการปกป้องเพื่อนร่วมรบในสถาณการณ์ต่างๆ
                              </td>
                          </tr>
                      </tbody></table>
                  </div>
                      <?php
                        $this->widget('zii.widgets.jui.CJuiTabs',array(
                            'tabs'=>array(
                                // panel 3 contains the content rendered by a partial view
                                'Basic'=>array('ajax'=>$this->createUrl('guardianbuild')."&build=Basic"),
                                'Storm'=>array('ajax'=>$this->createUrl('guardianbuild')."&build=Storm"),
                                'Earth'=>array('ajax'=>$this->createUrl('guardianbuild')."&build=Earth"),
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

