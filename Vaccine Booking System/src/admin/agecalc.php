<?php
                                            
                                            $now = new DateTime();
                                            $dob = new DateTime($row['Dateofbirth']);
                                            
                                            $diff = $now->diff($dob);
                                             
                                                                                        ?>