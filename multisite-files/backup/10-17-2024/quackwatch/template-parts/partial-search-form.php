                            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <div class="input-group">
                                    <input class="form-control" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'bootstrap-basic4'); ?>" title="<?php echo esc_attr_x('Search &hellip;', 'title', 'bootstrap-basic4'); ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit"><?php _e('Search', 'bootstrap-basic4'); ?></button>
                                    </span>
                                </div>
                            </form>