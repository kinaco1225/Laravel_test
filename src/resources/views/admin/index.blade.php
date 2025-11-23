@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="admin-container">

  <h2 class="admin-title">Admin</h2>

  <form class="search-form" action="/admin/search" method="GET">
    @csrf
    <input class="search-input-text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">

    <select class="search-select-gender" name="gender">
      <option value="" disabled selected>性別</option>
      <option value="1">男性</option>
      <option value="2">女性</option>
      <option value="3">その他</option>
    </select>

    <select class="search-select-content" name="category_id">
      <option value="" disabled selected>お問い合わせの種類</option>
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->content }}</option>
      @endforeach
    </select>

    <input class="search-select-date" type="date" name="date">

    <button class="search-btn">検索</button>
    <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>
  </form>

  <div class="pagination-area">
    <a class="export-btn" href="{{ route('admin.export', request()->query()) }}">エクスポート</a>
    <div class="pagination-wrapper">
      {{ $contacts->links('pagination::bootstrap-4') }}
    </div>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contacts as $contact)
      <tr>
        <td>{{ $contact->last_name.'　'.$contact->first_name }} </td>
        <td>{{ $contact->gender_label }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->category->content }}</td>
        <td>
          <button class="open-modal" data-target="modal-{{ $contact->id }}">
            詳細
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

<!-- モーダル部分 -->
@foreach ($contacts as $contact)
<div id="modal-{{ $contact->id }}" class="modal hidden">
  <div class="modal-content">
    <button class="close-modal">×</button>
    <table class="detail-table">
      <tr>
        <th>お名前</th>
        <td>{{ $contact->last_name.'　'.$contact->first_name }}</td>
      </tr>
      <tr>
        <th>性別</th>
        <td>{{ $contact->gender_label }}</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $contact->email }}</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>{{ $contact->tel }}</td>
      </tr>
      <tr>
        <th>住所</th>
        <td>{{ $contact->address }}</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{ $contact->building }}</td>
      </tr>
      <tr>
        <th>お問い合わせの種類</th>
        <td>{{ $contact->category->content }}</td>
      </tr>
      <tr>
        <th>お問い合わせの内容</th>
        <td>{{ $contact->detail }}</td>
      </tr>
    </table>
    <form action="{{ route('admin.destroy', $contact->id) }}" method="post">
      @csrf
      @method('DELETE')
      <button class="delte-btn">削除</button>
    </form>
  </div>
</div>
@endforeach

<script>
  document.querySelectorAll('.open-modal').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById(btn.dataset.target).classList.remove('hidden');
    });
  });

  document.querySelectorAll('.close-modal').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.closest('.modal').classList.add('hidden');
    });
  });
</script>

@endsection