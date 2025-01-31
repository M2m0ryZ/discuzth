<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_grouptrade.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'grouptrade_fids' => 'กำหนดวงใน',
	'grouptrade_fids_comment' => 'กำหนดวงในที่ต้องการให้แสดงข้อมูล สามารถกดปุ่ม CTRL ที่คีบอร์ดค้างไว้เพื่อเลือกหลายวงใน หากต้องการให้แสดงทุกวงใน ไม่ต้องเลือกวงในใดๆ',
	'grouptrade_gtids' => 'หมวดหมู่ของวงใน',
	'grouptrade_gtids_comment' => 'กำหนดหมวดหมู่ของวงในที่ต้องการให้แสดงข้อมูล สามารถกดปุ่ม CTRL ที่คีบอร์ดค้างไว้เพื่อเลือกหลายหมวดหมู่ หากต้องการให้แสดงทุกหมวดหมู่ ไม่ต้องเลือกหมวดหมู่ของวงในใดๆ',
	'grouptrade_uids' => 'UID สมาชิก',
	'grouptrade_uids_comment' => 'กำหนด  UID สมาชิก หากมีมากกว่าหนึ่ง UID กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ UID',
	'grouptrade_startrow' => 'จำนวนแถวเริ่มต้นของข้อมูล',
	'grouptrade_startrow_comment' => 'ถ้าจำเป็นต้องตั้งค่าจำนวนแถวของข้อมูลเริ่มต้น กรุณาใส่ค่าที่ต้องการ 0 คือจะการเริ่มการทำงานจากแถวแรก เป็นต้น',
	'grouptrade_items' => 'จำนวนข้อมูลที่จะแสดง',
	'grouptrade_items_comment' => 'กำหนดจำนวนข้อมูลที่จะแสดง กรุณากำหนดเป็นจำนวนเต็มที่มากกว่า 0',
	'grouptrade_titlelength' => 'จำนวนไบต์สูงสุดของชื่อกระทู้',
	'grouptrade_titlelength_comment' => 'กำหนดความยาวของชื่อกระทู้ หากกำหนดจำนวนไบต์เกินจะไม่ลดโดยอัตโนมัติ 0 คือจะลดโดยอัตโนมัติ',
	'grouptrade_fnamelength' => 'จำนวนไบต์สูงสุดของชื่อบอร์ด',
	'grouptrade_fnamelength_comment' => 'กำหนดความยาวของชื่อบอร์ด และความยาวของชื่อกระทู้จะถูกนับเข้าด้วยกัน',
	'grouptrade_summarylength' => 'จำนวนไบต์สูงสุดของเนื้อหา',
	'grouptrade_summarylength_comment' => 'กำหนดจำนวนไบต์สูงสุดของเนื้อหา 0 คือค่าเริ่มต้น สามารถกำหนดได้สูงสุดถึง 255',
	'grouptrade_tids' => 'กำหนดหัวข้อ',
	'grouptrade_tids_comment' => 'กำหนด tid ของหัวข้อที่ต้องการ หากมีมากกว่าหนึ่ง tid กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ tid หมายเหตุ: ปล่อยให้ว่างไว้หากไม่มีตัวกรองใดๆ',
	'grouptrade_keyword' => 'แท็กของหัวข้อ',
	'grouptrade_keyword_comment' => 'ตั้งค่าแท็กของกระทู้ หมายเหตุ: ปล่อยว่างไว้หากไม่มีแท็กใดๆ สามารถใช้สัญลักษณ์ * แทนแท็กหลัก ค้นหาโดยแท็กหลักเพิ่มเติม สามารถใช้ช่องว่างระหว่างคำ หรือ AND ในการเชื่อมต่อ เช่น win32 AND unix เพื่อให้ตรงกับแท็กหลักที่มากกว่าหนึ่งคำ สามารถใช้ | หรือ OR ในการเชื่อมต่อ เช่น win32 OR unix',
	'grouptrade_typeids' => 'หมวดหมู่หัวข้อ',
	'grouptrade_typeids_comment' => 'กำหนดหมวดหมู่หัวข้อ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'grouptrade_typeids_all' => 'หมวดหมู่หัวข้อทั้งหมด',
	'grouptrade_sortids' => 'หมวดหมู่ข้อมูล',
	'grouptrade_sortids_comment' => 'กำหนดหมวดหมู่ข้อมูล หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'grouptrade_sortids_all' => 'หมวดหมู่ข้อมูลทั้งหมด',
	'grouptrade_digest' => 'กรองกระทู้สำคัญ',
	'grouptrade_digest_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้สำคัญ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'grouptrade_digest_0' => 'กระทู้ทั่วไป',
	'grouptrade_digest_1' => 'กระทู้สำคัญ I',
	'grouptrade_digest_2' => 'กระทู้สำคัญ II',
	'grouptrade_digest_3' => 'กระทู้สำคัญ III',
	'grouptrade_stick' => 'กรองกระทู้ปักหมุด',
	'grouptrade_stick_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้ปักหมุด หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'grouptrade_stick_0' => 'กระทู้ทั่วไป',
	'grouptrade_stick_1' => 'ปักหมุด I',
	'grouptrade_stick_2' => 'ปักหมุด II',
	'grouptrade_stick_3' => 'ปักหมุด III',
	'grouptrade_special' => 'กรองกระทู้พิเศษ',
	'grouptrade_special_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้พิเศษ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'grouptrade_special_1' => 'กระทู้โพล',
	'grouptrade_special_2' => 'กระทู้ขายสินค้า',
	'grouptrade_special_3' => 'กระทู้รางวัล',
	'grouptrade_special_4' => 'กระทู้กิจกรรม',
	'grouptrade_special_5' => 'กระทู้โต้วาที',
	'grouptrade_special_0' => 'กระทู้ทั่วไป',
	'grouptrade_special_reward' => 'กรองกระทู้รางวัล',
	'grouptrade_special_reward_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้รางวัลหรือไม่',
	'grouptrade_special_reward_0' => 'ทั้งหมด',
	'grouptrade_special_reward_1' => 'ได้รับการแก้ไข',
	'grouptrade_special_reward_2' => 'ไม่แน่นอน',
	'grouptrade_recommend' => 'กรองกระทู้แนะนำ',
	'grouptrade_recommend_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้แนะนำหรือไม่',
	'grouptrade_orderby' => 'การจัดเรียงลำดับกระทู้',
	'grouptrade_orderby_comment' => 'ตั้งค่าการจัดเรียงลำดับของกระทู้',
	'grouptrade_orderby_lastpost' => 'จัดเรียงตามกระทู้ที่มีการตอบกลับล่าสุด',
	'grouptrade_orderby_dateline' => 'จัดเรียงตามวันที่ตั้งกระทู้',
	'grouptrade_orderby_replies' => 'จัดเรียงตามจำนวนข้อความตอบกลับ',
	'grouptrade_orderby_views' => 'จัดเรียงตามจำนวนการเข้าชม/ดู',
	'grouptrade_orderby_heats' => 'จัดเรียงตามความนิยม',
	'grouptrade_orderby_recommends' => 'จัดเรียงตามกระทู้แนะนำ',
	'grouptrade_orderby_hourviews' => 'จัดเรียงตามการเข้าชมต่อชั่วโมง',
	'grouptrade_orderby_todayviews' => 'จัดเรียงตามการเข้าชมต่อวัน',
	'grouptrade_orderby_weekviews' => 'จัดเรียงตามการเข้าชมต่อสัปดาห์',
	'grouptrade_orderby_monthviews' => 'จัดเรียงตามการเข้าชมต่อเดือน',
	'grouptrade_orderby_hours' => 'กำหนดเวลา (ชั่วโมง)',
	'grouptrade_orderby_hours_comment' => 'กำหนดเวลาในการจัดเรียงลำดับกระทู้',
	'grouptrade_orderby_todayhots' => 'จัดเรียงตามความนิยมต่อวัน',
	'grouptrade_orderby_weekhots' => 'จัดเรียงตามความนิยมต่อสัปดาห์',
	'grouptrade_orderby_monthhots' => 'จัดเรียงตามความนิยมต่อเดือน',
	'grouptrade_price_add' => ' เพิ่มเติม ',
	'grouptrade_place' => 'สถานที่จัดกิจกรรม',
	'grouptrade_class' => 'ประเภทกิจกรรม',
	'grouptrade_gender' => 'ผู้ที่สามารถเข้าร่วม',
	'grouptrade_gender_0' => 'ไม่จำกัด',
	'grouptrade_gender_1' => 'ผู้ชายเท่านั้น',
	'grouptrade_gender_2' => 'ผู้หญิงเท่านั้น',
	'grouptrade_orderby_weekstart' => 'จัดเรียงตามสัปดาห์ที่เริ่มต้น',
	'grouptrade_orderby_monthstart' => 'จัดเรียงตามเดือนที่เริ่มต้น',
	'grouptrade_orderby_weekexp' => 'จัดเรียงตามสัปดาห์ที่สิ้นสุด',
	'grouptrade_orderby_monthexp' => 'จัดเรียงตามเดือนที่สิ้นสุด',
	'grouptrade_gviewperm' => 'สิทธิ์ในการเรียกดูวงใน',
	'grouptrade_gviewperm_nolimit' => 'ไม่จำกัด',
	'grouptrade_gviewperm_only_member' => 'เฉพาะสมาชิก',
	'grouptrade_gviewperm_all_member' => 'ทั้งหมด',
	'grouptrade_highlight' => 'เน้นสี',
);

?>