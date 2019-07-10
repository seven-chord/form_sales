<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToCompanyCsvImport;

use SplFileObject;
use Carbon\Carbon;




//to_companiesの企業情報をインポートするファイルのコントローラー
class ToCompaniesCsvImportController extends Controller
{

       //csvインポート用ページ
       public function csvImportGet(Request $request)
       {
           return view('to_companies/csv_import');
   
       }

  
        //csvインポートページしたデータをDBにinsert

        //csvimportに必要と思われる
        protected $csvimport = null;
    
        //コンストラクタ呼び出し
        public function __construct(ToCompanyCsvImport $csvimport)
        {
            //csvimportを初期化 nullに
            $this->csvimport = $csvimport;
        }
    
    
        public function csvImportPost(Request $request)
        {
            //$to_companiesを全件削除
            // ToCompanyCsvImport::truncate();

            //ロケールを設定
            setlocale(LC_ALL, 'ja_JP.UTF-8');

            //アップロードしたファイルを取得
            //'csv_file'はviewのinputタグのname属性
            $uploaded_file = $request->file('csv_file');

            //アップロードしたファイルの絶対パスを取得
            $file_path = $request->file('csv_file')->path($uploaded_file);

            //SplFileObjectを生成
            $file = new SplFileObject($file_path);

            $file->setFlags(SplFileObject::READ_CSV);

            $row_count = 1;

            foreach($file as $row)
            {
                //最終行の処理（最終行が空っぽの場合の対策）
                if($row === [null]) continue;

                //1行目のヘッダーは取り込まない
                if($row_count > 1)
                {
                    $company_name = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                    $address_1 = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                    $address_2 = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
                    $telephone_1 = mb_convert_encoding($row[3], 'UTF-8', 'SJIS');
                    $telephone_2 = mb_convert_encoding($row[4], 'UTF-8', 'SJIS');
                    $telephone_3 = mb_convert_encoding($row[5], 'UTF-8', 'SJIS');
                    $categories = mb_convert_encoding($row[6], 'UTF-8', 'SJIS');
                    $contact_url = mb_convert_encoding($row[7], 'UTF-8', 'SJIS');

                    //現在時刻を取得
                    $now = Carbon::now();
                    ToCompanyCsvImport::insert(array(
                        'company_name' => $company_name,
                        'address_1' => $address_1,
                        'address_2' => $address_2,
                        'telephone_1' => $telephone_1,
                        'telephone_2' => $telephone_2,
                        'telephone_3' => $telephone_3,
                        'categories' => $categories,
                        'contact_url' => $contact_url,
                        'possible_send_flag' => 1,
                        'send_date' => $now,
                    ));
                }
              $row_count++;
            }

            return view('to_companies/csv_import');
        }


}
