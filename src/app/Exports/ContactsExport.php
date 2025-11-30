<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ContactsExport implements FromCollection, WithCustomCsvSettings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => true,   // ★ これが BOM 付与
            'include_separator_line' => false,
        ];
    }

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        // 検索条件取得
        $keyword = $this->request->keyword;
        $gender = $this->request->gender;
        $category_id = $this->request->category_id;
        $date = $this->request->date;

        // 検索クエリ
        $contacts = Contact::with('category')
            ->keywordSearch($keyword)
            ->genderSearch($gender)
            ->categorySearch($category_id)
            ->dateSearch($date)
            ->get();

        // カラム名（ヘッダー）
        $exportData[] = [
            'ID',
            '姓',
            '名',
            '性別',
            'メール',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせの内容',
            '作成日',
        ];

        // データ部
        foreach ($contacts as $contact) {

            $gender = match ($contact->gender) {
                1 => '男性',
                2 => '女性',
                3 => 'その他',
            };

            $exportData[] = [
                $contact->id,
                $contact->last_name,
                $contact->first_name,
                $gender,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category->content,
                $contact->detail,
                $contact->created_at->format('Y-m-d H:i:s'),
            ];
        }

        return collect($exportData);
    }
}