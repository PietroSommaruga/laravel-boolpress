<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $tags = ['rosso', 'verde', 'blu', 'nero', 'giallo', 'rosa'];
    // Comando per resettare la table
    // Tag::truncate();

    foreach ($tags as $tag) {
      $newTag = new Tag();
      $newTag->name = $tag;
      $newTag->slug = Str::slug($tag) . ".slug";
      $newTag->save();
    }
  }
}