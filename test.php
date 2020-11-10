<?php

<option value="1">UNO</option>
                                <option value="2">DOS</option>
                                <option value="3">TRES</option>
                                <option value="4">CUATRO</option>
                                <option value="5">CINCO</option>

                                {if ($score->id_pelicula) eq ($pelicula->id)}
                                        {for $i=$score->puntuacion-1 to $score->puntuacion}
                                            <option value="{$score->puntuacion}" selected="{$score->puntuacion}">{$puntuaciones.$i}</option>
                                        {/for}   
                                    {/if}    
                                        {for $i=1 to $score->puntuacion}
                                            <option value={$puntuaciones.$i}>{$puntuaciones.$i}</option>
                                        {/for}