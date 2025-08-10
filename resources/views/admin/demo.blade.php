<div class="col-md-12 col-12">

                                <!-- Hidden input to submit the content -->
                                <input type="hidden" value="{{ $about ? $about->about: "" }}" name="about" id="about_input">

                                <!-- Quill container -->
                                <div id="editor-container" 
                                    class="form-control @error('about') is-invalid @enderror" 
                                    style="height: 300px; overflow-y: auto;">
                                    {!! $about ? $about->about : '' !!}
                                </div>

                                <!-- Error message -->
                                @error('about')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                                <script>
                                    var quill = new Quill('#editor-container', {
                                        theme: 'snow',
                                        placeholder: 'Write about your company...',
                                    });

                                    // Real-time update to hidden input on each change
                                    quill.on('text-change', function () {
                                        document.querySelector('#about_input').value = quill.root.innerHTML;
                                    });

                                    // Optional: ensure latest content is submitted (backup)
                                    document.querySelector('form').addEventListener('submit', function () {
                                        document.querySelector('#about_input').value = quill.root.innerHTML;
                                    });
                                </script>