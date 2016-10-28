<?php
/**
 * Cards manager.
 * Component template.
 * Vue component.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<div class="cart-manager">
    <button class="button" @click.prevent="add">
        Add new
    </button>

    <div class="cards-holder">

        <card inline-template
            v-for="(card, index) in cards"
            track-by="$index"
            :model="card"
            :index="index"
        >
            <div class="card">
                <input type="hidden" name="meta_cards[]" :value="index">
                <div class="form-group">
                    <label>Title</label><br>
                    <input type="text"
                        class="regular-text"
                        v-model="model.title"
                        name="meta_card_titles[]"
                    />
                </div>
                <div class="form-group">
                    <label>Icon</label><br>
                    <input type="text"
                        class="regular-text"
                        v-model="model.icon"
                        name="meta_card_icons[]"
                    />
                </div>
                <div class="form-group">
                    <label>Color</label><br>
                    <select name="meta_card_colors[]" v-model="model.color">
                        <?php foreach ( $colors as $key => $value ) : ?>
                            <option value="<?= $key ?>">
                                <?= $value ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label><br>
                    <textarea name="meta_card_descriptions[]"
                        v-model="model.description"
                        rows="3"
                        class="regular-text"
                    ></textarea>
                </div>
                <div class="form-group">
                    <label>Url</label><br>
                    <select name="meta_card_urls[]" v-model="model.url">
                        <?php foreach ( get_pages() as $page ) : ?>
                            <option value="<?= get_permalink( $page->ID ) ?>">
                                <?= $page->post_title ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <button type="button" class="button"
                    @click="$parent.remove(index)"
                >
                    Remove
                </button>

            </div>
        </card>

    </div>
</div>