Webform Alias Container 8.x-1.x
-------------------------------

### About this Module

The Webform Alias Container module extends the Webform container to alias composite elements.

The primary use case for this module is where one element in the container will be visible at a time.
The difference from conventional containers is that data for the visible composite element will
be stored under the first composite element's name.

A typical Webform layout with a Webform Alias Container layout looks like this:

    Select element
    Alias Container
        Composite 1
        Composite 2
        Composite 3

The Select element would have a value of 1, 2 or 3. The composite element's visibility is based on 
this value so a value of 1 would make Composite 1 visible. To continue the exampele, the elements 
for Composite 1 are A, B and C while Composite 2 has A and C and Composite 3 has B and C. 

The number of instances for Composite 1 one must be greater than one if any of the other other
composite elements has an instance limit greater than one. Designers need to keep this in mind
because the module cannot check at this time.

The order of elements in the container is not an issue except as noted above since only
one or none should be visible at a time.

The container approach is designed to be used in conjunction with Webform Views. As such, the
first composite element should be a superset of elements found in the other composite elements. 
It is possible to define Composite 1 as a superset and make it hidden all the time. This can be
done by making it dependent on a value that cannot be selected using the Select element in the
above example.
 