<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'heroSection' => [
                'titlePart1' => 'บ้านยา',
                'titlePart2' => 'ดูแลสุขภาพคุณด้วยใจ',
                'description' => 'แหล่งรวมยาคุณภาพ เวชภัณฑ์ และผลิตภัณฑ์เพื่อสุขภาพครบวงจร พร้อมเภสัชกรผู้เชี่ยวชาญให้คำปรึกษาทุกวัน',
                'button1Text' => 'ปรึกษาเภสัชกร',
                'button2Text' => 'เลือกซื้อยา',
                'image' => 'https://placehold.co/1200x800/a7f3d0/4d7c0f?text=Pharmacy+Hero',
            ],
            'promotionsSection' => [
                'title' => 'โปรโมชั่นยาและผลิตภัณฑ์สุขภาพ',
                'description' => 'ข้อเสนอสุดคุ้มสำหรับยา เวชภัณฑ์ และผลิตภัณฑ์ดูแลสุขภาพที่คุณไม่ควรพลาด',
                'viewMoreText' => 'ดูเพิ่มเติม →',
                'items' => [
                    ['id' => 1, 'title' => 'โปรโมชั่นยาแก้แพ้ลด 10%', 'description' => 'ลดราคาพิเศษสำหรับยาแก้แพ้ทุกชนิด', 'image' => 'https://placehold.co/600x400/a7f3d0/4d7c0f?text=Pharmacy+Promo+1'],
                    ['id' => 2, 'title' => 'ซื้อ 1 แถม 1 วิตามินซี', 'description' => 'วิตามินซีคุณภาพสูง ซื้อ 1 ขวด แถมฟรี 1 ขวด', 'image' => 'https://placehold.co/600x400/a7f3d0/4d7c0f?text=Pharmacy+Promo+2'],
                    ['id' => 3, 'title' => 'ส่วนลด 50 บาท เมื่อซื้อครบ 500', 'description' => 'ใช้ได้กับทุกผลิตภัณฑ์ในร้าน', 'image' => 'https://placehold.co/600x400/a7f3d0/4d7c0f?text=Pharmacy+Promo+3'],
                ],
            ],
            'bestSellersSection' => [
                'title' => 'ยาและผลิตภัณฑ์สุขภาพขายดี',
                'description' => 'ผลิตภัณฑ์ยาและเวชภัณฑ์ที่ได้รับความไว้วางใจและเป็นที่นิยมสูงสุดจากลูกค้าของเรา',
                'categoryPrefix' => 'หมวดหมู่:',
                'items' => [
                    ['id' => 1, 'name' => 'ยาแก้ปวดพาราเซตามอล', 'category' => 'ยาสามัญ', 'price' => '฿50', 'image' => 'https://placehold.co/400x500/a7f3d0/4d7c0f?text=Pharmacy+Product+1'],
                    ['id' => 2, 'name' => 'แอลกอฮอล์ล้างแผล', 'category' => 'เวชภัณฑ์', 'price' => '฿80', 'image' => 'https://placehold.co/400x500/a7f3d0/4d7c0f?text=Pharmacy+Product+2'],
                    ['id' => 3, 'name' => 'หน้ากากอนามัย N95', 'category' => 'อุปกรณ์ป้องกัน', 'price' => '฿150', 'image' => 'https://placehold.co/400x500/a7f3d0/4d7c0f?text=Pharmacy+Product+3'],
                    ['id' => 4, 'name' => 'เจลล้างมืออนามัย', 'category' => 'ผลิตภัณฑ์ทำความสะอาด', 'price' => '฿120', 'image' => 'https://placehold.co/400x500/a7f3d0/4d7c0f?text=Pharmacy+Product+4'],
                ],
            ],
            'featuredArticlesSection' => [
                'title' => 'บทความสุขภาพและเคล็ดลับการดูแลตัวเอง',
                'description' => 'อัปเดตความรู้ด้านสุขภาพ เทคนิคการดูแลตัวเอง และข่าวสารทางการแพทย์จากผู้เชี่ยวชาญของเรา',
                'authorPrefix' => 'เภสัชกร',
                'items' => [
                    ['id' => 1, 'title' => 'การดูแลสุขภาพเบื้องต้น 1', 'date' => 'Aug 2, 2025', 'author' => 'เภสัชกร', 'image' => 'https://placehold.co/600x800/a7f3d0/4d7c0f?text=Health+Article+1'],
                    ['id' => 2, 'title' => 'เคล็ดลับการเลือกซื้อยา 2', 'date' => 'Aug 1, 2025', 'author' => 'เภสัชกร', 'image' => 'https://placehold.co/600x800/a7f3d0/4d7c0f?text=Health+Article+2'],
                    ['id' => 3, 'title' => 'สมุนไพรใกล้ตัว 3', 'date' => 'Jul 31, 2025', 'author' => 'เภสัชกร', 'image' => 'https://placehold.co/600x800/a7f3d0/4d7c0f?text=Health+Article+3'],
                ],
            ],
            'callToActionSection' => [
                'title' => 'ต้องการคำปรึกษาด้านสุขภาพ หรือหายาที่ใช่สำหรับคุณ?',
                'description' => 'ทีมเภสัชกรผู้เชี่ยวชาญของเราพร้อมให้คำแนะนำและช่วยเหลือคุณในการเลือกซื้อผลิตภัณฑ์ที่เหมาะสม',
                'button1Text' => 'ปรึกษาเภสัชกร',
                'button2Text' => 'ค้นหาสินค้า',
                'image' => 'https://placehold.co/800x600/ffffff/4d7c0f?text=Pharmacy+Consultation',
            ],
        ]);
    }
}
