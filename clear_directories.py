import os
from datetime import datetime
from posixpath import splitext

#-------------------------------------
# Getting the current work directory
#-------------------------------------
base = os.getcwd()
print('Base directory: ',base)

print('\nDeleting Error logs files...')
dirs = ['includes/error_log']
for d in dirs:
    d = os.path.join(base, d)
    #-------------------------
    # Moving to a directory
    #-------------------------
    print('Moving to:',d)
    os.chdir(d)
    #--------------------------------------
    # Getting the files list from the cwd
    #--------------------------------------
    for index, f in enumerate(os.listdir()):
        if os.path.isfile(f):
            filename, extension = os.path.splitext(f)
            if extension == '.html':
                print('Eliminando error log file:',index, f)
                os.remove(f)

print('\nDeleting bkp and tmp?????? files...')
dirs = ['app/sde', 'retail', 'corp']
for d in dirs:
    d = os.path.join(base, d)
    #-------------------------
    # Moving to a directory
    #-------------------------
    print('Moving to:',d)
    os.chdir(d)
    #--------------------------------------
    # Getting the files list from the cwd
    #--------------------------------------
    for index, f in enumerate(os.listdir()):
        if os.path.isfile(f):
            if f[0:3] == 'tmp':
                print('Eliminando tmp file:',index, f)
                os.remove(f)
            if f.find('.bkp.') != -1:
                print('Eliminando bkp file:',index, f)
                os.remove(f)

#-------------------------------------
# Getting the current work directory
#-------------------------------------
print('\nDeleting drafts files...')
dirs = ['drafts/panels', 'drafts']
for d in dirs:
    d = os.path.join(base, d)
    #-------------------------
    # Moving to a directory
    #-------------------------
    print('Moving to:',d)
    os.chdir(d)
    #--------------------------------------
    # Getting the files list from the cwd
    #--------------------------------------
    for index, f in enumerate(os.listdir()):
        if os.path.isfile(f):
            print('Eliminando draft file:',index, f)
            os.remove(f)



#--------------------------------
# Getting the modification time 
#--------------------------------
# mod_time = os.stat('CargaRecibidaEditPanel.class.php').st_mtime
# print(datetime.fromtimestamp(mod_time))

#--------------------------------------
# Go thruout the whole directory tree
#--------------------------------------
# for dirpath, dirnames, filenames in os.walk(os.getcwd()):
#     print('Current path:',dirpath)
#     print('Directories:',dirnames)
#     print('Files:',filenames)
#     print()


# file_path = os.path.join(os.getcwd(),'text.txt')
# print(file_path)


#------------
# Fake path
#------------
# filename = '/tmp/test.txt'

# print('whole path:',filename)
# print('basename:',os.path.basename(filename))
# print('dirname:',os.path.dirname(filename))
# print('both parts:',os.path.split(filename))
# print('checking existence:',os.path.exists(filename))
# print('checking if it is a file:',os.path.isfile(filename))
# print('checking if it is a directory:',os.path.isdir(filename))
# print('filename and extension:',os.path.splitext(filename))
