<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
      <div class="warp">
          <div class="pageall">
              <div class="charecterall">
                  <div class="charec_left" style="background-image: url('images/characters/rouge/cha_rogue_img01.png');

background-repeat: no-repeat;

background-position: right top;">
                      <h2>CHARACTER</h2>
                      <div class="txtbox" style="margin-bottom:10px;">
                          <a href="<?= Yii::app()->createUrl('character/guardian');?>"><img src="images/characters/gurad-inactive.png"  onmouseover="this.src='images/characters/gurad-active.png'" onmouseout="this.src='images/characters/gurad-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/sorceress');?>"><img src="images/characters/sorceress-inactive.png"   onmouseover="this.src='images/characters/sorceress-active.png'" onmouseout="this.src='images/characters/sorceress-inactive.png'"></a>
                          <img src="images/characters/rouge-active.png" >
                          <a href="<?= Yii::app()->createUrl('character/warrior');?>"><img src="images/characters/war-inactive.png"   onmouseover="this.src='images/characters/war-active.png'" onmouseout="this.src='images/characters/war-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/archer');?>"><img src="images/characters/archer-inactive.png"   onmouseover="this.src='images/characters/archer-active.png'" onmouseout="this.src='images/characters/archer-inactive.png'"></a>
                        </div>
                      <h1>ROUGE</h1>
                      <h2>นักฆ่าผู้เลือกโชคชะตาอันโดดเดี่ยว</h2>
                      <div class="txtbox" style="margin-top:5px;width:500px">
                          ผู้โอบอุ้มความเจ็บปวดแห่งการสำนึกผิดและเดินไปยังเส้นทางอันโดดเดี่ยว Rogueนั้นใช้ทักษะในการใช้ยาพิษที่ชำนาญ และการโจมตีที่รวดเร็วรุนแรง สิ่งเหล่านี้ทำให้เขากลายเป็นศัตรูที่น่าสะพรึงกลัวในทุกสนามรบ
                      </div>
                      <table width="100%" border="0" cellspacing="8" cellpadding="0" style="width:900px;margin:20px 0px 20px 0px">
                          <tbody><tr>
                              <td width="16%" align="center" valign="top">
                                  <img src="images/characters/rouge/cha_rogue_img03.png" width="57" height="56"></td>
                              <td width="84%" valign="middle">
                                  <h3 style="padding-top:0px">Assault
                                  </h3>
                                  นักฆ่าผู้มีทักษะในการเข้าโจมตีสังหารเป้าหมายได้อย่างรวดเร็วด้วยการโจมตีที่ต่อเนื่อง ความสามารถในการหลบหลีกและโต้กลับสูง
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="top">
                                  <img src="images/characters/rouge/cha_rogue_img04.png" width="56" height="56"></td>
                              <td valign="middle">
                                  <h3 style="padding-top:0px">Venom
                                  </h3>
                                  นักฆ่าผู้ที่มีความเชี่ยวชาญในการใช้ยาพิษ สามารถทำให้เป้าหมายอ่อนกำลังลงในสภาวะต่างๆ ยิ่งการต่อสู้กินเวลานาน ก็จะยิ่งสร้างความเสียหายได้มาก
                              </td>
                          </tr>
                      </tbody></table>
                  </div>
                      <?php
                        $this->widget('zii.widgets.jui.CJuiTabs',array(
                            'tabs'=>array(
                                // panel 3 contains the content rendered by a partial view
                                'Basic'=>array('ajax'=>$this->createUrl('rougebuild')."&build=Basic"),
                                'Assault'=>array('ajax'=>$this->createUrl('rougebuild')."&build=Assault"),
                                'Venom'=>array('ajax'=>$this->createUrl('rougebuild')."&build=Venom"),
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

