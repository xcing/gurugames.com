<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
      <div class="warp">
          <div class="pageall">
              <div class="charecterall">
                  <div class="charec_left" style="background-image: url('images/characters/sorceress/cha_sorceress_img01.png');

background-repeat: no-repeat;

background-position: right top;">
                      <h2>CHARACTER</h2>
                      <div class="txtbox" style="margin-bottom:10px;">
                          <a href="<?= Yii::app()->createUrl('character/guardian');?>"><img src="images/characters/gurad-inactive.png"  onmouseover="this.src='images/characters/gurad-active.png'" onmouseout="this.src='images/characters/gurad-inactive.png'"></a>
                          <img src="images/characters/sorceress-active.png">
                          <a href="<?= Yii::app()->createUrl('character/rouge');?>"><img src="images/characters/rouge-inactive.png"    onmouseover="this.src='images/characters/rouge-active.png'" onmouseout="this.src='images/characters/rouge-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/warrior');?>"><img src="images/characters/war-inactive.png"   onmouseover="this.src='images/characters/war-active.png'" onmouseout="this.src='images/characters/war-inactive.png'"></a>
                          <a href="<?= Yii::app()->createUrl('character/archer');?>"><img src="images/characters/archer-inactive.png"   onmouseover="this.src='images/characters/archer-active.png'" onmouseout="this.src='images/characters/archer-inactive.png'"></a>
                        </div>
                      <h1>Sorceress</h1>
                      <h2>นักเวทย์ผู้มีโชคชะตาแห่งพรสวรรค์</h2>
                      <div class="txtbox" style="margin-top:5px;width:500px">
                          
นักเวทย์ผู้ที่เป็นความหวังเดียวของสมาคมเวทย์มนต์ เพื่อฟื้นฟูสมาคมแห่งเวทย์มนต์ที่ล่มสลายไปกลับคืนมา Sorceress เป็นผู้ที่สามารถใช้พลังแห่งอัคคีและพลังแห่งธารน้ำแข็งในการต่อสู้ สามารถต่อสู้ด้วย พลังเวทย์ที่รุนแรงในระยะไกล ได้อย่างรวดเร็ว
                      </div>
                      <table width="100%" border="0" cellspacing="8" cellpadding="0" style="width:900px;margin:20px 0px 20px 0px">
                          <tbody><tr>
                              <td width="16%" align="center" valign="top">
                                  <img src="images/characters/sorceress/cha_sorceress_img03.png" width="57" height="56"></td>
                              <td width="84%" valign="middle">
                                  <h3 style="padding-top:0px">Flame
                                  </h3>
                                  มีพลังเวทย์ที่มีพลังทำลายล้างสูง ได้ประโยชน์จาก Sign of Heat ที่เกิดขึ้นในระหว่างการใช้เวทย์ มาเสริมความรุนแรง สร้างความเสียหายแก่เป้าหมายได้อย่างรุนแรง
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="top">
                                  <img src="images/characters/sorceress/cha_sorceress_img04.png" width="56" height="56"></td>
                              <td valign="middle">
                                  <h3 style="padding-top:0px">Freeze
                                  </h3>
                                  ใช้เวลาในการร่ายต่ำ สามารถขัดจังหวะการต่อสู้ของศัตรู และใช้ Sign of Frost เพื่อลดความได้เปรียบของศัตรูในการต่อสู้
                              </td>
                          </tr>
                      </tbody></table>
                  </div>
                      <?php
                        $this->widget('zii.widgets.jui.CJuiTabs',array(
                            'tabs'=>array(
                                // panel 3 contains the content rendered by a partial view
                                'Basic'=>array('ajax'=>$this->createUrl('sorceressbuild')."&build=Basic"),
                                'FLAME'=>array('ajax'=>$this->createUrl('sorceressbuild')."&build=FLAME"),
                                'FREEZE'=>array('ajax'=>$this->createUrl('sorceressbuild')."&build=FREEZE"),
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

