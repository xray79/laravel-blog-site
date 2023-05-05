### databases in laravel

models allow us to abstract the interface to sql and allows simpler or easier to understand code

.env for security
migrations set up tables with correct columns
migrate:fresh allows us to revert and migrate in one command

active record pattern is 1 class for each row/field in the db

php artisan make:migration create_posts_table
this allows us to create a new schema that will create a posts table in the db
can define cols in the db with attr in the migration under
Schema::create() {
$table->string('name_of_col');
$table->id();
}

php artisan make:model Post
creates a contiainer for the queries to the db
each instance is 1 row
e.g Post::findAll() will return all posts in a class with every col as an attr

updates can be made by using
$post->body = $post->body . 'some extra string'

if adding html to the db, it must be escaped with {!! !!} operators in laravel

#### mass assignment

Post model has attr $fillable and $guarded
$fillable = []; of vals that CAN be mass assigned
$guarded = []; of vals that CANNOT be mass assigned ALSO everything else is mass assignable by default

Post::create(['title' => 'long title', 'excerpt' => 'an excerpt', 'body' => 'long body field']);
syntax to mass assign fields

$post->update(['body' => 'new body text']);
only works on an instance of a class,
can mass update on cols of 1 row

#### route model binding

type hint Post callback into route handler,
callback takes $post var
route has post wildcard
all this allows laravel to set wildcard to post id then match it to relevant post row in db and return the relevant post.

/{post:slug} wildcard
for uri .../personal-post will return post with corresponding slug prop
as long as (Post $post) is passed to the callback (type hinted input).

#### eloquent relations

hasOne, hasMany, belongsTo, belongsToMany

#### show all posts associated with a category

category hasMany posts
use {category:slug} wildcard to associate with category wildcard,
type hint callback as Category $category,
use return $category->post

in Category model use post(){} to return the $this->hasMany(Category::class)

#### n+1 problem

-   clockwork browser dev tools
-   use Post::with('category')->get() to get all posts with specific category
-   this is better b/c it uses 1 sql query for all posts instead of a new one for each post
-   sql query for each post = n+1 problem

#### db seeding

-   in database seeder file
-   use Post::create(['title' => 'my title', ...etc]) runs when db is seeded
-   php artisan migrate:fresh --seed
-   lets us drop db and recreate rows and cols, and populate/seed with new vals from seeder

#### factories

-   factories allow
