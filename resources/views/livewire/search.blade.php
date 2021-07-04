
<div>
<input type="text" class="search-input contact-form_input" wire:model="searchTerm" placeholder="Начните ввод кода или название отхода">
    


        @foreach ($users as $user)
              <div class="search-result-article">
                <span class="search-result-article_title"
                  >{{ $user->name }}</span
                >
                <p class="search-result-article_text">
                  {{ $user->types }}
                </p>
                <p class="search-result-article_text">
                  Код - {{ $user->code }}
                </p>
                <a href="/codes/{{ $user->code }}" class="search-result-article_details btn">Подробнее</a>
              </div>            
        @endforeach
        
       
</div>        