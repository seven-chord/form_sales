<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToCompanyCsvImport;

use SplFileObject;



//to_companiesの企業情報をインポートするファイルのコントローラー
class ToCompaniesCsvImportController extends Controller
{

       //csvインポート用ページ
       public function csvImportGet(Request $request)
       {
           return view('to_companies/csv_import');
   
       }

  
        //csvインポートページしたデータをDBにinsert
        public function csvImportPost(Request $request)
        {
            //to_companiesテーブルオブジェクトインスタンスを作成
            $to_companies = new To_company;


            // '情報が追加されました。';
            // '項目等に誤りがあります。';
        }


        //csvimportに必要と思われる
        protected $csvimport = null;
    
        //コンストラクタ呼び出し
        public function __construct(ToCompanyCsvImport $csvimport)
        {
            //csvimportを初期化 nullに
            $this->csvimport = $csvimport;
        }
    
    
        public function import(Request $request)
        {
            //$to_companiesを全件削除
            ToCompanyCsvImport::truncate();

            //ロケールを設定
            setlocale(LC_ALL, 'ja_JP.UTF-8');

            //アップロードしたファイルを取得
            //'csv_file'はviewのinputタグのname属性
            $uploaded_file = $request->file('csv_file');

            //アップロードしたファイルの絶対パスを取得
            $file_path = $request->file('csv_file')->path($uploaded_file);

            //SplFileObjectを生成
            $file = new SplFileObject();

            $file->setFlags(SplFileObject::READ_CSV);

            $row_count = 1;

            foreach($file as $row)
            {
                //最終行の処理（最終行が空っぽの場合の対策）
                if($row === [null]) continue;

                //1行目のヘッダーは取り込まない
                if($row_count > 1)
                {
                    $test_name1 = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                    $test_name2 = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                    $test_name3 = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
                    $test_name4 = mb_convert_encoding($row[3], 'UTF-8', 'SJIS');
                    $test_name5 = mb_convert_encoding($row[4], 'UTF-8', 'SJIS');


                    ToCompanyCsvImport::insert(array(
                        'company_name' => $test_name1,
                        ''



                    ));

                };


            }


        }


}
