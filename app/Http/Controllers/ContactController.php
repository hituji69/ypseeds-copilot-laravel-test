<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * お問い合わせフォームを表示
     */
    public function show()
    {
        return view('contact.form');
    }

    /**
     * お問い合わせフォームの送信処理
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => '名前は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'message.required' => 'お問い合わせ内容は必須です。',
        ]);

        // 送信成功時のメッセージをセッションに保存
        return redirect()->route('contact.form')->with('success', 'お問い合わせを受け付けました');
    }
}
