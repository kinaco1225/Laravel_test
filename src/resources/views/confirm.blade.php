@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}?v={{ time() }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>confirm</h2>
  </div>
  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <div class="confirm-table__text-fullname">
              <span class="fullname-last">{{ $contact['last_name'] }}</span>
              <span class="fullname-first">{{ $contact['first_name'] }}</span>
            </div>
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="text" value="{{ $contact['gender'] }}" readonly>
            <input type="hidden" name="gender" value="{{ $contact['gender_raw'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email']}}" readonly>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" value="{{ $contact['tel1'].'-'.$contact['tel2'].'-'.$contact['tel3']}}" readonly>
            <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
            <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
            <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address']}}" readonly>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building']}}" readonly>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <div class="confirm-table__text-category">
              {{ $contact['category_name'] }}
            </div>
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail']}}" readonly>
          </td>
        </tr>
      </table>
      
      <div class="confirm__buttons-wrapper">

        <!-- 送信 -->
        <form action="/contacts" method="post">
          @csrf
          <button class="btn btn--submit" type="submit">送信</button>
        </form>

        <!-- 修正 -->
        <form action="/contacts/back" method="post">
          @csrf
          <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
          <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
          <input type="hidden" name="gender" value="{{ $contact['gender_raw'] }}">
          <input type="hidden" name="email" value="{{ $contact['email'] }}">
          <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
          <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
          <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
          <input type="hidden" name="address" value="{{ $contact['address'] }}">
          <input type="hidden" name="building" value="{{ $contact['building'] }}">
          <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
          <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

          <button class="btn btn--back" type="submit">修正</button>
        </form>

      </div>
  </form>

</div>
@endsection