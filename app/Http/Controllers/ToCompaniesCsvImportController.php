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

            //バルクインサート用の配列を用意
            $insert_array = [];

            $row_count = 1;

            foreach($file as $row)
            {
                //最終行の処理（最終行が空っぽの場合の対策）
                if($row === [null]) continue;

                //1行目のヘッダーは取り込まない
                if($row_count > 1)
                {
                    //エンコーディング
                    $company_name =  mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                    $categories  =  mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                    $contact_url  =  mb_convert_encoding($row[2], 'UTF-8', 'SJIS');

                    //現在時刻を取得
                    $now = Carbon::now();
                    $csvimport_array = [
                        'company_name' => $company_name,
                        'address_1' => '不明',
                        'address_2' => '不明',
                        'telephone_1' => '不明',
                        'categories' => $categories,
                        'possible_send_flag' => 0,
                        'created_date' => $now,
                        'contact_url' => $contact_url,
                        'from_company_id' => '6'
                    ];

                    array_push($insert_array, $csvimport_array);

                }
              $row_count++;
            }

            //配列の数を数える
            $array_count = count($insert_array);


            if($array_count < 50){

                //to_companiesテーブルへバルクインサート
                ToCompanyCsvImport::insert($insert_array);

            }else{
                //追加した配列が500以上なら、array_chunkで500ずつ分割する
                $array_partial = array_chunk($insert_array, 50); //配列


                //分割した数を数えて
                $array_partial_count = count($array_partial);//配列の数を取得

                //分割した数の分だけインポートを繰り返す
                for($i = 0; $i <= $array_partial_count - 1; $i++){

                    //to_companiesテーブルへバルクインサート
                    ToCompanyCsvImport::insert($array_partial[$i]);

                }
            }
            return view('to_companies/csv_import');

            //本当は、下記のように変数messageに値を持たせて表示させたい
            // return view('to_companies/csv_import',['message' => '取り込みが完了しました。']);
        }
}
