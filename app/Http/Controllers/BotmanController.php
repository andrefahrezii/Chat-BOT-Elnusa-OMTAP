<?php
namespace App\Http\Controllers;
   
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
   
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'Home') {
                $this->askName($botman);
            }else
            if ($message == '1') {
                $this->c1($botman);
            }else
            if ($message == '2') {
                $this->c2($botman);
            }else
            if ($message == '3') {
                $this->c3($botman);
            }else
            if ($message == 'cs') {
                $this->cs($botman);
            }
            
            else{
                $botman->reply("<p>Mohon Maaf pak saya tidak mengenali perintah bapak <p>Ketik angka di bawah ini untuk bantuan <p> 1. Kendala Teknis<p> 2. Palporan Pipa Bocor <p> 3. Informasi Perusahaan <p>");
            }
   
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('bersama bapak siapa saya berbicara?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('baik Bapak'.$name. '<p> 1. Kendala Teknis<p> 2. Palporan Pipa Bocor <p> 3. Informasi Perusahaan <p>');
        });
    }

    public function c1($botman)
    {
        $botman->ask('kendala teknis seperti apa yang bapak alami?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('baik dengan  '.$name.'kendala teknisnya sudah saya samapaikan ke kantor, mohon menunggu beberapa waktu');
            $this->say('apakah ada lagi yang ingin di tanyakan pak<p> ketik "cs" untuk infomasi costumer service kami');
        });
    }
    public function c2($botman)
    {
        $botman->ask('Pelaporan pipa bocor untu lokasinya dimana pak?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('baik pak nanti ada team yang ke sana untuk cek lokasi, Terimakasih atas laporannya pak'.$name);
            $this->say('apakah ada lagi yang ingin di tanyakan pak<p> ketik "cs" untuk infomasi costumer service kami');

            
        });
    }
    public function c3($botman)
    {
        $botman->ask('baik pak elnusa adalah Perusaahn Elnusa OM & TAP Begerak di  bidang maintenence dan Pengolahan Limbah Kantornya berada di Pendopo Pali pak', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('apakah ada lagi yang ingin di tanyakan pak<p> ketik "cs" untuk infomasi costumer service kami');
        });
    }
    public function cs($botman)
    {
        $botman->ask('baik pak berikut Concat Person Yang bisa bapak hubungi<p> Telpon : +6282175999896 <p> Email : andre.fahrezi24@gmail.com <p> Terimakasih pak semoga bermanfaat ', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('apakah ada lagi yang ingin di tanyakan pak<p> ketik "cs" untuk infomasi costumer service kami');
        });
    }
}
