<nav class="nav flex-column">
    <a href="{{ route('admin.categories.index') }}" class="nav-item nav-link">{{ __('menu.Categories') }}</a>
    <a href="{{ route('admin.recipes.index') }}" class="nav-item nav-link">{{ __('menu.Recipes') }}</a>
    <a href="{{ route('admin.ingredients.index') }}" class="nav-item nav-link">{{ __('menu.Ingredients') }}</a>
    <a href="{{ route('admin.measures.index') }}" class="nav-item nav-link">{{ __('menu.Measures') }}</a>
    <a href="{{ route('admin.instruments.index') }}" class="nav-item nav-link">{{ __('menu.Instruments') }}</a>
    <a href="{{ route('admin.instructions.index') }}" class="nav-item nav-link">{{ __('menu.Instructions') }}</a>
    <a href="{{ route('admin.comments.index') }}" class="nav-item nav-link">{{ __('menu.Comments') }}</a>
    <a href="{{ route('admin.images.index') }}" class="nav-item nav-link">{{ __('menu.Images') }}</a>
    <a href="{{ route('admin.authors.index') }}" class="nav-item nav-link">{{ __('menu.Authors') }}</a>
</nav>
