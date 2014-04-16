This plugin allows us to get the direct path to a file that we have uploaded instead of the download link that is supplied by the file field type.
This is handy for instances such as uploading videos that will be used in a video tags source.

Below are examples of its uses


Pass a file field type with the file download location

{{ file_real_path:get file=video_file:file }}

Pass an id of a file

{{ file_real_path:get file=file_id }}